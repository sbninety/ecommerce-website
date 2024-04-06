<template>
  <div class="mt-[26px]">
    <div class="ml-5 text-[20px] leading-[24.2px]">Thông Tin Cơ Bản</div>
    <div class="mt-[30px] flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Danh mục sản phẩm <span class="text-[#FF0000]">(*)</span>
      </div>
      <div class="w-[400px]">
        <FormSelect
          :placeholder="$t('PLACEHOLDER.category')"
          :items="categories"
          :error="
            error && error.type == $t('ATTRIBUTE.product.category_id')
              ? error.message
              : ''
          "
          v-model:input="product.category_id"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        SKU <span class="text-[#FF0000]">(*)</span>
      </div>
      <div class="w-[400px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.sku')"
          inputType="text"
          :error="
            error && error.type == $t('ATTRIBUTE.product.sku')
              ? error.message
              : ''
          "
          v-model:input="product.sku"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Tên sản phẩm <span class="text-[#FF0000]">(*)</span>
      </div>
      <div class="w-[800px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.productName')"
          inputType="text"
          :error="
            error && error.type == $t('ATTRIBUTE.product.name')
              ? error.message
              : ''
          "
          v-model:input="product.name"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Slug <span class="text-[#FF0000]">(*)</span>
      </div>
      <div class="w-[800px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.slug')"
          inputType="text"
          :error="
            error && error.type == $t('ATTRIBUTE.product.slug')
              ? error.message
              : ''
          "
          v-model:input="product.slug"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Số lượng <span class="text-[#FF0000]">(*)</span>
      </div>
      <div class="w-[400px]">
        <FormInput
          placeholder="Số lượng"
          inputType="text"
          :error="
            error && error.type == $t('ATTRIBUTE.product.quantity')
              ? error.message
              : ''
          "
          v-model:input="product.quantity"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-full flex">
        <div
          class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]"
        >
          Giá bán <span class="text-[#FF0000]">(*)</span>
        </div>
        <div class="w-[300px]">
          <FormInput
            :placeholder="$t('PLACEHOLDER.price')"
            inputType="text"
            :error="
              error && error.type == $t('ATTRIBUTE.product.price')
                ? error.message
                : ''
            "
            v-model:input="product.price"
          />
        </div>
      </div>
      <div class="w-full flex">
        <div class="w-[145px] pt-[17px] text-[14px] leading-[16.94px]">
          Giảm giá
        </div>
        <div>
          <div class="w-[300px]">
            <FormInput
              :placeholder="$t('PLACEHOLDER.discount')"
              inputType="text"
              :error="
                error && error.type == $t('ATTRIBUTE.product.discount')
                  ? error.message
                  : ''
              "
              v-model:input="product.discount"
            />
          </div>
          <div class="w-[300px]">
            <FormRadio
              :items="['%', 'đồng']"
              v-model:input="product.discount_type"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Tình trạng
      </div>
      <div class="w-[800px]">
        <FormRadio
          :items="['Đang bán', 'Dừng bán']"
          v-model:input="product.published"
        />
      </div>
    </div>
    <div class="ml-5 mt-[26px] text-[20px] leading-[24.2px]">Hình Ảnh</div>
    <div class="mt-5 pb-[16px]">
      <label for="image">
        <div
          class="h-[200px] flex items-center justify-center ml-[30px] mr-[50px] border border-[#00000066] border-dotted hover:cursor-pointer"
        >
          <div
            class="px-[39px] py-[13px] border border-[#00000033] text-[20px] text-[#00000033] leading-[24.2px]"
          >
            Tải ảnh lên
          </div>
        </div>
        <input type="file" hidden multiple id="image" @change="uploadImage" />
      </label>
      <div v-if="images" class="mt-[30px] px-[30px] flex flex-wrap gap-[30px]">
        <div class="relative" v-for="(image, i) in images" :key="image">
          <img
            :src="image.filePath"
            width="120"
            class="rounded border border-[#00000033]"
          />
          <div
            class="absolute -top-3 -right-3 hover:cursor-pointer"
            @click="deleteImage(i)"
          >
            <Icon
              name="material-symbols-light:close-rounded"
              size="25"
              class="bg-gray-400 rounded-full"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 pb-[33px]">
      <div class="ml-5 text-[20px] leading-[24.2px]">Thông Tin Mô Tả</div>
      <div class="mt-5 ml-[40px] mr-[40px]">
        <rich-editor
          :value="editorInput"
          @input="(event) => (product.description = event)"
        />
      </div>
    </div>
    <div class="mt-5 ml-5 text-[20px] leading-[24.2px]">Thông Tin Chi Tiết</div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Thương hiệu
      </div>
      <div class="w-[800px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.brand')"
          inputType="text"
          v-model:input="product.branch"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Hạn bảo hành
      </div>
      <div class="w-[800px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.warranty')"
          inputType="text"
          v-model:input="product.warranty"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Loại
      </div>
      <div class="w-[800px]">
        <FormInput
          :placeholder="$t('PLACEHOLDER.type')"
          inputType="text"
          v-model:input="product.warrant_type"
        />
      </div>
    </div>
    <div class="mt-5 flex">
      <div class="w-[210px] pl-[40px] pt-[17px] text-[14px] leading-[16.94px]">
        Gửi hàng từ
      </div>
      <div class="w-[800px]">
        <FormSelect
          :placeholder="$t('PLACEHOLDER.from')"
          :items="cities"
          v-model:input="product.city_id"
        />
      </div>
    </div>
    <div class="flex mt-[46px]">
      <div class="w-[210px] pl-5 text-[20px] leading-[24.2px]">Biến Thể</div>
      <div>
        <label class="inline-flex items-center cursor-pointer">
          <input type="checkbox" class="sr-only peer" v-model="isCheck" />
          <div
            class="relative w-11 h-6 bg-[#CCCCCC] peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007006]"
          ></div>
        </label>
      </div>
    </div>
    <div class="h-[50px] flex mt-5">
      <div class="w-[210px] text-[18px] leading-[21.78px] pl-[40px] pt-[17px]">
        Màu sắc
      </div>
      <button
        class="text-[14px] text-[#007006] leading-[16.94px] pt-[17px]"
        @click="addVariant"
        :disabled="!isCheck"
      >
        + Thêm thông tin
      </button>
    </div>
    <div class="mt-5 flex" v-for="(o, i) in product.variants" :key="o">
      <div class="w-[210px]" />
      <div class="flex">
        <div class="w-[100px] text-[14px] leading-[16.94px] pt-[17px]">
          Tên màu <span class="text-[#FF0000]">(*)</span>
        </div>
        <div class="w-[150px]">
          <FormInput
            :placeholder="$t('PLACEHOLDER.colorName')"
            :disable="!isCheck"
            inputType="text"
            :error="
              error && error.type == $t('ATTRIBUTE.variant.colorName') + i
                ? error.message
                : ''
            "
            v-model:input="o.color"
          />
        </div>
        <div
          class="w-[100px] text-[14px] leading-[16.94px] pt-[17px] ml-[70px]"
        >
          Đơn giá
        </div>
        <div class="w-[200px]">
          <FormInput
            :placeholder="$t('PLACEHOLDER.priceColor')"
            :disable="!isCheck"
            inputType="text"
            :error="
              error && error.type == $t('ATTRIBUTE.variant.priceColor') + i
                ? error.message
                : ''
            "
            v-model:input="o.price"
          />
        </div>
        <button
          class="ml-[40px]"
          :disabled="!isCheck"
          @click="deleteVariant(i)"
        >
          <img src="~/assets/images/image 58.png" width="20" />
        </button>
      </div>
    </div>
    <div class="mt-[54px] pb-[32px] flex gap-[61px]">
      <button
        class="ml-[204px] px-[73px] py-[16px] border border-[#0000001A] rounded text-[#000000CC] leading-[19.36px]"
      >
        Hủy Bỏ
      </button>
      <button
        @click="saveDraft()"
        class="px-[63px] py-[16px] border border-[#0000001A] rounded bg-[#CCCCCC] text-[#000000B2] leading-[19.36px]"
      >
        Lưu Nháp
      </button>
      <button
        class="px-[43px] py-[16px] border border-[#0000001A] rounded bg-[#007006] text-white leading-[19.36px]"
      >
        Lưu & Công Bố
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Product } from "~/types/models/product";
import { useTrans } from "~/composables/trans";
import { useCategoryService } from "~/services/category";
import { useCityService } from "~/services/city";

const categoryService = useCategoryService();
const cityService = useCityService();

const categories = ref(null);
const cities = ref(null);
const images = ref([]);

const { required, notEmpty, isNumber } = useValidate();

const { trans } = useTrans();

const props = defineProps({
  item: {
    type: Object,
    default: {
      category_id: null,
      sku: null,
      name: null,
      slug: null,
      quantity: null,
      price: null,
      discount: null,
      discount_type: "%",
      type: "Bình thường",
      published: "Đang bán",
      images: [],
      description: [],
      branch: null,
      warranty: null,
      warrant_type: null,
      from: null,
      variants: [
        {
          color: null,
          price: null,
        },
      ],
    },
  },
});
const { item } = toRefs(props);

const product = reactive<any>({
  category_id: null,
  sku: null,
  name: null,
  slug: null,
  quantity: null,
  price: null,
  discount: null,
  discount_type: null,
  type: 1,
  published: null,
  images: [],
  description: null,
  branch: null,
  warranty: null,
  warranty_type: null,
  city_id: null,
  variants: [
    {
      color: null,
      price: null,
    },
  ],
});

onMounted(async () => {
  await categoryService.getAll().then((res) => {
    categories.value = res.data;
  });

  await cityService.getAll().then((res) => {
    cities.value = res.data;
  });
  product.category_id = item.value.category_id;
  product.sku = item.value.sku;
  product.name = item.value.name;
  product.slug = item.value.slug;
  product.price = item.value.price;
  product.quantity = item.value.quantity;
  product.discount = item.value.discount;
  product.discount_type = item.value.discount_type;
  product.type = item.value.type;
  product.published = item.value.published;
  product.images = item.value.images;
  product.branch = item.value.branch;
  product.warranty = item.value.warranty;
  product.type = item.value.type;
  product.city_id = item.value.city_id;
  product.variants = item.value.variants;
});

const isCheck = ref(true);
const error = ref(null);

const uploadImage = (e: any) => {
  const selectedFiles = e.target;
  if (selectedFiles.files.length > 0) {
    for (let i = 0; i < selectedFiles.files.length; i++) {
      product.images.push(selectedFiles.files[i]);
      const selectedFile = selectedFiles.files[i];

      const reader = new FileReader();
      reader.onload = () => {
        images.value.push({
          filePath: reader.result,
        });
      };

      reader.readAsDataURL(selectedFile);
    }
  }
};

const addVariant = () => {
  product.variants.push({ color: null, price: null });
};

const deleteVariant = (index: any) => {
  product.variants.splice(index, 1);
};

const deleteImage = (index: any) => {
  product.images.splice(index, 1);
  images.value.splice(index, 1);
};
const validated = () => {
  error.value = null;

  if (!required(product.category_id)) {
    error.value = {
      type: trans("ATTRIBUTE.product.category_id"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.category_id")]),
    };
  } else if (!required(product.sku?.trim()) || !notEmpty(product.sku)) {
    error.value = {
      type: trans("ATTRIBUTE.product.sku"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.sku")]),
    };
  } else if (!required(product.name?.trim()) || !notEmpty(product.name)) {
    error.value = {
      type: trans("ATTRIBUTE.product.name"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.name")]),
    };
  } else if (!required(product.slug?.trim()) || !notEmpty(product.slug)) {
    error.value = {
      type: trans("ATTRIBUTE.product.slug"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.slug")]),
    };
  } else if (
    !required(product.quantity?.trim()) ||
    !notEmpty(product.quantity)
  ) {
    error.value = {
      type: trans("ATTRIBUTE.product.quantity"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.quantity")]),
    };
  } else if (!isNumber(product.quantity)) {
    error.value = {
      type: trans("ATTRIBUTE.product.quantity"),
      message: trans("ERR_COM_00028"),
    };
  } else if (!required(product.price?.trim()) || !notEmpty(product.price)) {
    error.value = {
      type: trans("ATTRIBUTE.product.price"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.product.price")]),
    };
  } else if (!isNumber(product.price)) {
    error.value = {
      type: trans("ATTRIBUTE.product.price"),
      message: trans("ERR_COM_00028"),
    };
  } else if (!isNumber(product.discount) && product.discount) {
    error.value = {
      type: trans("ATTRIBUTE.product.discount"),
      message: trans("ERR_COM_00028"),
    };
  } else if (isCheck.value) {
    for (let i = 0; i < product.variants.length; i++) {
      const obj = product.variants[i];
      if (!required(obj.color?.trim()) || !notEmpty(obj.color)) {
        error.value = {
          type: trans("ATTRIBUTE.variant.colorName") + i,
          message: trans("ERR_VAL_0001", [
            trans("ATTRIBUTE.variant.colorName"),
          ]),
        };
      } else if (obj.price && !isNumber(obj.price)) {
        error.value = {
          type: trans("ATTRIBUTE.variant.priceColor") + i,
          message: trans("ERR_COM_00028"),
        };
      }
    }
  }

  if (error.value) {
    return false;
  }
  return true;
};

const saveDraft = () => {
  if (!validated()) {
    return;
  }
  console.log(product);
};
</script>