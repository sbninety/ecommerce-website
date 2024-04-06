<template>
  <NuxtLink>
    <img :src="category.image" width="84" class="mx-auto mt-2.5 rounded-full" />
    <p class="text-center text-[14px] mt-[15px] mb-[7px]">
      {{ category.name }}
    </p>
  </NuxtLink>
</template>

<script setup>
defineProps(["category"]);
</script>