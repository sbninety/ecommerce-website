<template>
  <div class="h-full flex flex-col justify-between">
    <div class="flex flex-1 flex-col gap-5">
      <div></div>
      <div v-for="comment in displayComments" :key="comment">
        <CardComment :comment="comment" />
      </div>
    </div>
    <div class="mt-[73px] flex items-center justify-end gap-3">
      <button :disabled="currentPage === 1" @click="previousPage()"><</button>
      <div v-for="i in totalPages" :key="i">
        <button
          class="w-[20px]"
          :class="currentPage === i ? 'bg-gray-300' : ''"
          @click="getCurrentPage(i)"
        >
          {{ i }}
        </button>
      </div>
      <button :disabled="currentPage === totalPages" @click="nextPage()">
        >
      </button>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(["comments"]);
const { comments } = toRefs(props);

const itemsPerPage = ref(3);
const currentPage = ref(1);

const totalComments = computed(() => {
  return comments.value.length;
});

const totalPages = computed(() => {
  return Math.ceil(totalComments.value / itemsPerPage.value);
});

const displayComments = computed(() => {
  const startIndex = (currentPage.value - 1) * itemsPerPage.value;
  const endIndex = startIndex + itemsPerPage.value;
  return comments.value.slice(startIndex, endIndex);
});

const previousPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++;
  }
};

const getCurrentPage = (i) => {
  currentPage.value = i;
};
</script>