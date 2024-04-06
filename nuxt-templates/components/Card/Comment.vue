<template>
  <div class="flex border-b border-[#0000000D]">
    <div>
      <img :src="comment.avatar" width="40" class="rounded-full" />
    </div>
    <div class="mx-[15px] w-full">
      <div class="text-[14px]">{{ comment.username }}</div>
      <div class="flex gap-0.5 mt-[5px]">
        <div v-for="i in comment.rating" :key="i">
          <img src="~/assets/images/star.png" width="14" />
        </div>
      </div>
      <div class="text-[12px] text-[#00000080] mt-[5px]">
        {{ comment.created_at }} | Phân loại hàng: Space Gray
      </div>
      <div class="text-[12px] text-[#000000CC] mt-2.5">
        {{ comment.content }}
      </div>
      <div class="flex flex-wrap gap-4 mt-[15px] mb-[22px]">
        <div v-for="image in comment.images" :key="image">
          <img :src="image.path" width="72" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(["comment"]);
const { comment } = toRefs(props);
</script>