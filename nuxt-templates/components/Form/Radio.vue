<template>
  <div class="w-full h-[50px] flex items-center gap-5">
    <div
      class="flex items-center hover:cursor-pointer"
      v-for="item in items"
      :key="item"
      @click="inputComputed = item"
    >
      <div
        class="w-[24px] h-[24px] border border-[#00000033] rounded-full flex items-center justify-center"
      >
        <div
          v-if="inputComputed === item"
          class="w-[14px] h-[14px] border border-[#00000033] bg-[#007006] rounded-full"
        ></div>
      </div>
      <div class="ml-[8px] text-[16px] text-[#0000006B] leading-[19.36px]">
        {{ item }}
      </div>
    </div>
  </div>
  <span v-if="error" class="text-red-500 text-[14px]">
    {{ error }}
  </span>
</template>

<script setup>
const props = defineProps({
  items: Object,
  input: String,
  checked: {
    type: Boolean,
    default: false,
  },
  error: String,
});
const emit = defineEmits(["update:input"]);

const { items, input, checked } = toRefs(props);

const inputComputed = computed({
  get: () => input.value,
  set: (val) => emit("update:input", val),
});

onMounted(() => {
  if (checked.value) {
    inputComputed.value = items.value[0];
  }
});
</script>