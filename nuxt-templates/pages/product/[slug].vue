<template>
  <DefaultLayout>
    <div class="max-w-[1200px] w-full mx-auto py-[30px]">
      <div class="text-[14px] pb-[30px]">
        <!-- <ul>
          <NuxtLink
            v-for="(crumb, index) in list"
            :key="index"
            :to="actions[index]"
            >{{ crumb }} /
          </NuxtLink>
        </ul> -->
        <NuxtLink class="text-[#007006]">Shoop </NuxtLink>/
        <NuxtLink class="text-[#007006]">Máy tính & Laptop </NuxtLink>/
        <NuxtLink class="text-[#007006]">Laptop </NuxtLink>/ Máy tính xách tay
        Apple MacBook Air (2020) M1 Chip, 13.3-inch, 8GB, 256GB SSD
      </div>
      <div class="flex bg-white">
        <Thumb :images="product.images" />
        <div
          class="mx-[27.5px] w-full py-[30px] px-[15px] flex flex-col gap-[22px]"
        >
          <div class="text-[20px] leading-[24.2px]">
            <p>
              {{ product.name }}
            </p>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex gap-[30px] text-[14px]">
              <div class="flex items-center gap-[5px]">
                <div class="text-[#00000099]">{{ rateComputed }}.0</div>
                <div class="flex items-center gap-[2px]">
                  <div v-for="i in rateComputed" :key="i">
                    <img src="~/assets/images/star.png" width="12" />
                  </div>
                </div>
              </div>
              <div>
                <p>2,2k <span class="text-[#00000099]">Đánh giá</span></p>
              </div>
              <div>
                <p>7,9k <span class="text-[#00000099]">Đã bán</span></p>
              </div>
            </div>
            <div class="text-[14px] text-[#00000099]">Tố cáo</div>
          </div>
          <div class="bg-[#E0E0E033] flex items-center gap-[30px] h-[66px]">
            <div />
            <div
              class="text-[20px] text-[#00000080]"
              :class="product.discount ? 'line-through' : ''"
            >
              ₫<span
                v-if="
                  product.variants.length && product.variants[indexColor].price
                "
              >
                {{ priceFormat(product.variants[indexColor].price) }}
              </span>
              <span v-else>{{ priceFormat(product.price) }}</span>
            </div>
            <div class="text-[32px] text-[#007006]">
              <span v-if="product.discount">
                <span v-if="product.discount_type == 1">
                  ₫<span
                    v-if="
                      product.variants.length &&
                      product.variants[indexColor].price
                    "
                  >
                    {{
                      priceFormat(
                        product.variants[indexColor].price -
                          product.variants[indexColor].price *
                            (product.discount / 100)
                      )
                    }}
                  </span>
                  <span v-else>{{
                    priceFormat(
                      product.price - product.price * (product.discount / 100)
                    )
                  }}</span>
                </span>
                <span v-if="product.discount_type == 2">
                  ₫<span
                    v-if="
                      product.variants.length &&
                      product.variants[indexColor].price
                    "
                  >
                    {{
                      priceFormat(
                        product.variants[indexColor].price - product.discount
                      )
                    }}
                  </span>
                  <span v-else>{{
                    priceFormat(product.price - product.discount)
                  }}</span>
                </span>
              </span>
              <span v-else>
                ₫<span
                  v-if="
                    product.variants.length &&
                    product.variants[indexColor].price
                  "
                >
                  {{ priceFormat(product.variants[indexColor].price) }}
                </span>
                <span v-else>{{ priceFormat(product.price) }}</span>
              </span>
            </div>
            <div class="bg-[#007006] px-[5px] text-white text-[14px]">
              <span v-if="product.discount_type == 1">
                <span v-if="product.discount">{{ product.discount }}</span>
                <span v-else>0</span>% GIẢM
              </span>
              <span v-if="product.discount_type == 2">
                GIẢM
                <span v-if="product.discount">{{
                  priceFormat(product.discount)
                }}</span>
                <span v-else>0</span>
                ĐỒNG
              </span>
            </div>
          </div>
          <div class="flex">
            <div class="w-[110px] text-[14px] text-[#000000CC]">Vận chuyển</div>
            <div class="text-[14px]">
              <p>Xử lý đơn hàng bởi Shoop</p>
              <p class="mt-[6px]">Miễn phí vận chuyển</p>
              <div class="flex mt-2.5 gap-5">
                <div class="text-[#00000080]">Vận Chuyển Tới</div>
                <div>
                  <select>
                    <option value="">Huyện Ba Vì</option>
                    <option value="">Huyện Bốn Vì</option>
                    <option value="">Huyện Năm Vì</option>
                  </select>
                </div>
              </div>
              <div class="flex my-2.5 gap-5">
                <div class="text-[#00000080]">Phí Vận Chuyển</div>
                <div>
                  <select>
                    <option value="">₫0</option>
                    <option value="">₫10</option>
                    <option value="">₫20</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center" v-if="product.variants.length">
            <div class="w-[110px] text-[14px] text-[#000000CC]">Màu sắc</div>
            <div class="text-[14px] flex flex-wrap gap-[15px]">
              <div
                v-for="(variant, index) in product.variants"
                :key="variant"
                @click="indexColor = index"
                class="h-[40px] border flex items-center px-2 hover:cursor-pointer"
                :class="
                  indexColor === index
                    ? 'border-[#007006] text-[#007006]'
                    : 'border-[#00000033] text-[#00000099]'
                "
              >
                <div>
                  <img src="~/assets/images/image 47.png" width="24" />
                </div>
                <div>{{ variant.color }}</div>
              </div>
            </div>
          </div>
          <div class="flex items-center">
            <div class="w-[110px] text-[14px] text-[#000000CC]">Số lượng</div>
            <div class="flex h-8">
              <button
                @click="decrease()"
                class="border-y border-l border-[#00000033] w-8"
              >
                -
              </button>
              <input
                type="number"
                class="w-16 border border-[#00000033] text-center focus:outline-none"
                min="1"
                v-model="quantity"
              />
              <button
                @click="increase()"
                class="border-y border-r border-[#00000033] w-8"
              >
                +
              </button>
            </div>
            <div class="text-[14px] text-[#00000066] ml-5">
              {{ product.quantity }} sản phẩm có sẵn
            </div>
            <div class="text-[14px] text-red-400 ml-5">
              {{ error }}
            </div>
          </div>
          <div class="flex items-center gap-[30px]">
            <button
              class="border border-[#007006] text-[#007006] text-[14px] px-[34px] py-4"
            >
              Thêm Vào Giỏ Hàng
            </button>
            <button class="bg-[#007006] text-white text-[14px] py-4 px-14">
              Mua Ngay
            </button>
          </div>
        </div>
      </div>
      <div class="flex bg-white mt-[30px]">
        <div class="w-[400px]">
          <div class="max-w-[370px] w-full mx-[15px] flex">
            <div class="px-5 py-7 w-[123.33px]">
              <img :src="store.image" width="82" class="rounded-full" />
            </div>
            <div class="pl-[15px]">
              <p class="text-[16px] text-[#000000CC] mt-5">
                {{ store.name }}
              </p>
              <p class="text-[14px] text-[#00000080] mt-[5px]">
                Online 15 Giờ Trước
              </p>
              <div class="flex mt-[15px] gap-[15px] mb-[25px]">
                <button
                  class="border border-[#007006] text-[14px] text-[#007006] px-[15px] py-2"
                >
                  Chat Ngay
                </button>
                <button
                  class="border border-[#00000033] text-[14px] text-[#000000CC] px-[15px] py-2"
                >
                  Xem Shop
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="w-[800px]">
          <div
            class="max-w-[770px] w-full mx-auto flex items-center gap-[50px] text-[14px] h-full"
          >
            <div class="flex flex-col justify-between w-[167px] h-[55px]">
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Đánh Giá</div>
                <div class="text-[#007006]">67,6k</div>
              </div>
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Sản Phẩm</div>
                <div class="text-[#007006]">300</div>
              </div>
            </div>
            <div class="flex flex-col justify-between w-[275px] h-[55px]">
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Tỉ Lệ Phản Hồi</div>
                <div class="text-[#007006]">100%</div>
              </div>
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Thời Gian Phản Hồi</div>
                <div class="text-[#007006]">trong vài giờ</div>
              </div>
            </div>
            <div class="flex flex-col justify-between w-[212px] h-[55px]">
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Tham Gia</div>
                <div class="text-[#007006]">5 năm trước</div>
              </div>
              <div class="flex justify-between">
                <div class="text-[#000000CC]">Người Theo Dõi</div>
                <div class="text-[#007006]">588k</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-white pt-[25px] mt-[30px]">
        <div
          class="max-w-[1170px] w-full mx-auto bg-[#00000005] py-[13px] pl-[15px] text-[20px]"
        >
          CHI TIẾT SẢN PHẨM
        </div>
        <div
          class="max-w-[1170px] w-full flex flex-col gap-[15px] mx-auto pb-[15px] mt-[30px] text-[14px]"
        >
          <div class="flex mx-[15px]">
            <div class="w-[140px] text-[#00000080]">Danh Mục</div>
            <div class="text-[#007006]">Shoop / Máy Tính & Laptop / Laptop</div>
          </div>
          <div class="flex mx-[15px]">
            <div class="w-[140px] text-[#00000080]">Thương hiệu</div>
            <div class="text-[#007006]">{{ product.brand }}</div>
          </div>
          <div class="flex mx-[15px]">
            <div class="w-[140px] text-[#00000080]">Loại laptop</div>
            <div>Khác</div>
          </div>
          <div class="flex mx-[15px]">
            <div class="w-[140px] text-[#00000080]">Kho hàng</div>
            <div>{{ product.quantity }}</div>
          </div>
          <div class="flex mx-[15px]">
            <div class="w-[140px] text-[#00000080]">Gửi từ</div>
            <div>{{ product.city }}</div>
          </div>
        </div>
        <div
          class="max-w-[1170px] w-full mx-auto bg-[#00000005] py-[13px] pl-[15px] text-[20px]"
        >
          MÔ TẢ SẢN PHẨM
        </div>
        <div class="mt-[30px] px-5 pb-[35px]">
          <!-- <img src="~/assets/images/detail.png" width="1140" class="mx-auto" /> -->
          <span v-html="product.description"></span>
        </div>
      </div>
      <div class="bg-white mt-[30px] pb-[38px]">
        <div class="text-[20px] pl-[40px] pt-[25px]">ĐÁNH GIÁ SẢN PHẨM</div>
        <div class="max-w-[1110px] w-full mx-auto mt-5 flex bg-[#0070060D]">
          <div
            class="w-[222px] flex flex-col items-center gap-[10px] pt-[25px] pb-9 px-[31px]"
          >
            <div class="text-[#007006] w-[160px]">
              <span class="text-[40px]">{{ rateComputed }}.0</span
              ><span class="text-[20px]"> trên</span
              ><span class="text-[24px]"> 5</span>
            </div>
            <div class="flex w-[160px] gap-0.5">
              <div v-for="i in rateComputed" :key="i">
                <img src="~/assets/images/star.png" width="28" />
              </div>
            </div>
          </div>
          <div class="w-full flex flex-wrap items-center text-[14px]">
            <div class="flex flex-wrap gap-[15px]">
              <button
                class="bg-white border border-[#007006] rounded text-[#007006] px-[28px] py-[5px]"
              >
                Tất Cả
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                5 Sao (2,1k)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                4 Sao (31)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                3 Sao (31)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                2 Sao (31)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                1 Sao (31)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                Có bình luận (31)
              </button>
              <button
                class="bg-white border border-[#0000001A] rounded px-[11px] py-[5px]"
              >
                Có Hình Ảnh / Video (739)
              </button>
            </div>
          </div>
        </div>
        <div
          v-if="product.comments.length"
          class="max-w-[1110px] w-full mx-auto mt-5"
        >
          <Comments :comments="product.comments" />
        </div>
      </div>
      <div class="bg-white mt-[30px]">
        <div class="pl-5 pt-5 text-[20px]">CÁC SẢN PHẨM KHÁC CỦA SHOP</div>
        <div class="mt-2.5 grid grid-cols-4">
          <div v-for="product in otherProducts" :key="product">
            <CardProduct :product="product" />
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white">
      <div class="max-w-[1200px] w-full h-[279px] mx-auto">
        <div class="text-[20px] font-bold pl-5 pt-10">
          Có Thể Bạn Đang Tìm Kiếm
        </div>
        <div class="text-[20px] pl-5 pr-9 mt-10">
          bàn phím cơ ajazz ac067 | màn hình máy tính dell ultrasharp u2422h | ổ
          cứng hdd 500gb | bàn phím tiếng trung | ổ cứng samsung pm9a1 | micro
          cài áo không dây | thanh lăn mắt | máy tính bảng realme | bảng vẽ điện
          tử wacom cintiq 16 | máy đo thân nhiệt | razer | laptop gaming |
          lenovo legion 5 | chuột | usb
        </div>
      </div>
    </div>
  </DefaultLayout>
</template>

<script setup>
import DefaultLayout from "~/layouts/Default.vue";
import { useProductService } from "~/services/product";
import { useCrumbs } from "~/composables/crumbs";

const productService = useProductService();
const route = useRoute();
const { list, actions, setCrumbs, setActions } = useCrumbs();

// const breadcrumbs = ["Home", "Page 1", "Page 2"];
// const links = ["/", "/auth/login"];

const slug = ref(null);
const product = reactive({
  id: null,
  store_id: null,
  category_id: null,
  name: null,
  price: null,
  discount: null,
  discount_type: null,
  quantity: null,
  description: null,
  brand: null,
  warranty: null,
  warranty_type: null,
  city: null,
  images: [
    {
      id: null,
      path: null,
    },
  ],
  comments: [
    {
      id: null,
      rating: null,
      content: null,
      username: null,
      avatar: null,
      created_at: null,
      images: [],
    },
  ],
  variants: [
    {
      id: null,
      color: null,
      price: null,
    },
  ],
});
const otherProducts = ref(null);
const store = reactive({
  id: null,
  name: null,
  image: null,
});

const indexColor = ref(0);
const quantity = ref(1);
const error = ref(null);

const decrease = () => {
  if (quantity.value > 1) {
    quantity.value--;
  } else {
    error.value = "Số lượng không thể nhỏ hơn 1";
    setTimeout(() => (error.value = null), 1500);
  }
};

const increase = () => {
  if (quantity.value < product.quantity) {
    quantity.value++;
  } else {
    error.value = "Quá số lượng có sẵn";
    setTimeout(() => (error.value = null), 1500);
  }
};

watch(
  () => quantity.value,
  () => {
    if (quantity.value < 1) {
      error.value = "Số lượng không thể nhỏ hơn 1";
      setTimeout(() => (quantity.value = 1), 1500);
      setTimeout(() => (error.value = null), 1500);
    }
    if (quantity.value > product.quantity) {
      error.value = "Quá số lượng có sẵn";
      setTimeout(() => (quantity.value = 1), 1500);
      setTimeout(() => (error.value = null), 1500);
    }
  }
);

onMounted(async () => {
  // setCrumbs(breadcrumbs);
  // setActions(links);
  await productService
    .getProductBySlug(route.params.slug)
    .then((res) => {
      product.id = res.data.id;
      product.store_id = res.data.store_id;
      product.category_id = res.data.category_id;
      product.name = res.data.name;
      product.price = res.data.price;
      product.discount = res.data.discount;
      product.discount_type = res.data.discount_type;
      product.quantity = res.data.quantity;
      product.description = res.data.description;
      product.brand = res.data.brand;
      product.warranty = res.data.warranty;
      product.warranty_type = res.data.warranty_type;
      product.city = res.data.city;
      product.images = res.data.images;
      product.comments = res.data.comments;
      product.variants = res.data.variants;
      console.log(product.variants);
    })
    .catch((e) => {
      console.log(e);
    });

  await productService
    .getStore(route.params.slug)
    .then((res) => {
      store.id = res.data.id;
      store.name = res.data.name;
      store.image = res.data.image;
    })
    .catch((e) => {
      console.log(e);
    });
  await productService
    .getOtherProduct()
    .then((res) => {
      otherProducts.value = res.data;
    })
    .catch((e) => {
      console.log(e);
    });
});

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

const rateComputed = computed(() => {
  var rate = 0;
  if (!product.comments.length) {
    return rate;
  }
  for (let i = 0; i < product.comments.length; i++) {
    rate += product.comments[i].rating;
  }
  return rate / product.comments.length;
});
</script>
<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>