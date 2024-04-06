<template>
  <div class="w-[250px]">
    <div
      class="w-full h-[46px] flex items-center justify-between pl-5 pr-4 hover:cursor-pointer hover:bg-gray-200"
      @click="isOpen = !isOpen"
    >
      <div class="flex items-center gap-2.5">
        <div>
          <img :src="item.image" />
        </div>
        <div class="text-[14px] text-[#00000080] font-bold">
          {{ item.title }}
        </div>
      </div>
      <div>
        <img
          src="~/assets/images/image 36.png"
          width="14"
          class="transition duration-700"
          :class="isOpen ? 'rotate-180' : ''"
        />
      </div>
    </div>
    <Transition>
      <div v-if="isOpen" class="w-full text-[14px] text-[#00000080]">
        <div
          v-for="o in item.subItems"
          :key="o"
          class="pl-[54px] py-[6px] hover:bg-gray-100"
        >
          <NuxtLink :to="o.to">
            {{ o.title }}
          </NuxtLink>
        </div>
      </div>
    </Transition>
  </div>
</template>

<script setup>
const props = defineProps(["item"]);
const { item } = toRefs(props);

const isOpen = ref(false);
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
  max-height: 90px;
  transition: max-height 0.25s ease-in;
  overflow: hidden;
}

.v-enter-from,
.v-leave-to {
  max-height: 0;
  transition: max-height 0.25s ease-out;
  overflow: hidden;
}
</style>