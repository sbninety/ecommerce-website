<template>
  <AdminLayout>
    <div class="w-full bg-[#F6F6F6] py-[30px]">
      <div class="max-w-[1000px] w-full h-[712px] mx-auto bg-white pt-5">
        <div class="font-bold text-[20px] leading-[24.2px] ml-5">
          Cài đặt thông tin Shop
        </div>
        <div class="mt-[48px] flex">
          <div class="w-[700px] pr-[50px]">
            <div class="flex">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Email
              </div>
              <div class="w-[440px]">
                <FormInput
                  placeholder="Email"
                  disable
                  inputType="email"
                  error=""
                  v-model:input="email"
                />
              </div>
            </div>
            <div class="flex mt-5">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Tên
              </div>
              <div class="w-[440px]">
                <FormInput
                  placeholder="Tên"
                  inputType="text"
                  error=""
                  v-model:input="username"
                />
              </div>
            </div>
            <div class="flex mt-5">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Số điện thoại
              </div>
              <div class="w-[440px]">
                <FormInput
                  placeholder="Số điện thoại"
                  inputType="text"
                  error=""
                  v-model:input="phone"
                />
              </div>
            </div>
            <div class="flex mt-5">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Giới tính
              </div>
              <div class="w-[440px]">
                <FormRadio :items="genders" v-model:input="gender" error="" />
              </div>
            </div>
            <div class="flex mt-5">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Tên shop
              </div>
              <div class="w-[440px]">
                <FormInput
                  placeholder="Tên shop"
                  inputType="text"
                  error=""
                  v-model:input="name"
                />
              </div>
            </div>
            <div class="flex mt-5">
              <div
                class="w-[210px] text-right pr-[61px] text-[14px] leading-[16.94px] pt-[17px]"
              >
                Địa chỉ lấy hàng
              </div>
              <div class="w-[440px] flex flex-col gap-5">
                <div class="flex gap-5">
                  <FormSelect
                    placeholder="Thành phố"
                    error=""
                    v-model:input="city_id"
                    :items="cities"
                  />
                  <FormSelect
                    placeholder="Quận/huyện"
                    error=""
                    v-model:input="district_id"
                    :items="districts"
                  />
                </div>
                <div>
                  <FormInput
                    placeholder="Địa chỉ"
                    inputType="text"
                    error=""
                    v-model:input="address"
                  />
                </div>
              </div>
            </div>
            <div class="flex mt-[40px]">
              <div class="w-[210px]" />
              <div class="w-[440px]">
                <button
                  @click="submit()"
                  class="px-[49px] py-[16px] bg-[#007006] text-white leading-[19.36px] rounded border border-[#0000001A]"
                >
                  Lưu thông tin
                </button>
              </div>
            </div>
          </div>
          <div class="w-[300px]">
            <div class="mt-[45px]">
              <img
                :src="image ? image : '/_nuxt/assets/images/avatar.png'"
                width="200"
                class="mx-auto rounded-full"
              />
            </div>
            <div
              class="w-[120px] mx-auto mt-[25px] px-[22px] py-[16px] border border-[#0000001A] rounded"
            >
              <label
                for="image"
                class="text-[16px] text-[#000000B2] leading-[19.36px] hover:cursor-pointer"
                >Chọn Ảnh</label
              >
              <input
                type="file"
                id="image"
                @change="displayImage"
                hidden
                accept=".png, .jpeg, .jpg"
              />
            </div>
            <div
              class="mt-[30px] text-center text-[#0000006B] leading-[19.36px]"
            >
              <div>Dung lượng file tối đa 1 MB</div>
              <div class="mt-[5px]">Định dạng: JPEG, JPG, PNG</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from "~/layouts/Admin.vue";
import { useStoreStore } from "~/stores/store";
import { useCityService } from "~/services/city";
import { useDistrictService } from "~/services/district";
import { useStoreService } from "~/services/store";
import axios from "axios";

const cityService = useCityService();
const districtService = useDistrictService();
const storeService = useStoreService();
const storeStore = useStoreStore();

const cities = ref(null);
const districts = ref(null);
const genders = ref(["Nam", "Nữ", "Khác"]);

const email = ref("");
const username = ref("");
const phone = ref(null);
const gender = ref(null);
const name = ref("");
const city_id = ref(null);
const district_id = ref(null);
const address = ref(null);
const image = ref(null);
const file = ref(null);

onMounted(async () => {
  email.value = storeStore.email;
  username.value = storeStore.username;
  phone.value = storeStore.phone;
  gender.value = storeStore.gender;
  name.value = storeStore.name;
  city_id.value = storeStore.city_id;
  district_id.value = storeStore.district_id;
  address.value = storeStore.address;

  if (storeStore.image) {
    image.value = storeStore.image;
  }

  const res = await cityService.getAll();
  cities.value = res.data;
});

watch(
  () => city_id.value,
  async () => {
    const res = await districtService.getDistrictByCity(city_id.value);
    districts.value = res.data;
  }
);

const displayImage = (event) => {
  file.value = event.target.files[0];
  const selectedFiles = event.target.files[0];
  if (selectedFiles) {
    const reader = new FileReader();
    reader.onload = (e) => {
      image.value = e.target.result;
    };
    reader.readAsDataURL(selectedFiles);
  }
};

const submit = async () => {
  let formData = new FormData();

  formData.append("username", username.value);
  formData.append("phone", phone.value);
  formData.append("gender", gender.value);
  formData.append("name", name.value);
  formData.append("city_id", city_id.value);
  formData.append("district_id", district_id.value);
  formData.append("address", address.value);
  if (file.value) {
    formData.append("image", file.value);
  }
  formData.append("_method", "PUT");

  const res = await storeService.update(formData, storeStore.id);

  if (res.status) {
    storeStore.getInfo(storeStore.id);
    navigateTo("/admin");
  }
};
</script>
