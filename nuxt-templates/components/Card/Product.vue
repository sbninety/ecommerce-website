<template>
  <div class="mx-[15px] flex flex-col relative">
    <NuxtLink :to="`/product/${product.slug}`">
      <img :src="product.images[0].path" width="270px" />
    </NuxtLink>
    <div class="pl-2.5 pt-2.5">
      <NuxtLink>
        <p class="h-[50px] text-[14px] leading-[16.94px]">
          {{ product.name }}
        </p>
      </NuxtLink>
      <p
        class="text-[12px] text-[#ACACAC] mt-4"
        :class="product.discount ? 'line-through' : ''"
      >
        ₫{{ priceFormat(product.price) }}
      </p>
      <div class="text-[14px] text-[#AB1515] mt-[5px] mb-[14px]">
        <div v-if="product.discount_type == 1">
          ₫{{
            priceFormat(
              product.price - product.price * (product.discount / 100)
            )
          }}
        </div>
        <div v-if="product.discount_type == 2">
          ₫{{ priceFormat(product.price - product.discount) }}
        </div>
      </div>
    </div>
    <button
      class="absolute bg-[#007006] rounded-full w-[40px] h-[40px] p-[10px] bottom-3 right-3"
    >
      <img src="~/assets/images/shopping-cart (2) 1.png" width="20" />
    </button>
  </div>
</template>

<script setup>
const props = defineProps(["product"]);
const { product } = toRefs(props);

const priceFormat = (x) => {
  let val = (x / 1).toFixed(0).replace(".", ",");
  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
</script>