<template>
  <label class="inline-flex items-center cursor-pointer">
    <input type="checkbox" class="sr-only peer" v-model="check" />
    <div
      @click="update"
      class="relative w-11 h-6 bg-[#CCCCCC] peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007006]"
    ></div>
  </label>
</template>

<script setup>
import { useProductService } from "~/services/product";

const props = defineProps(["product"]);

const productService = useProductService();
const { product } = toRefs(props);

const check = ref(false);

onMounted(() => {
  if (product.value.published == 1) {
    check.value = true;
  }
});

const update = async () => {
  if (!check.value) {
    product.value.published = 1;
  } else {
    product.value.published = 2;
  }
  let formData = new FormData();

  formData.append("published", product.value.published);
  formData.append("_method", "PATCH");

  await productService.updateStatus(formData, product.value.id);
};
</script>