<template>
  <div class="w-full border-b border-[#0000000D]">
    <div
      class="max-w-[1410px] w-full mx-auto flex justify-between items-center"
    >
      <div class="flex gap-1.5 items-center">
        <div class="mt-[5px] mb-[12px]">
          <img src="~/assets/images/logo.png" width="90.97" />
        </div>
        <div class="text-[18px]">Kênh Người Bán</div>
      </div>
      <div class="flex items-center gap-[25px]">
        <div class="flex items-center">
          <div>
            <img :src="storeStore.image" width="36" class="rounded-full" />
          </div>
          <div class="text-[14px] ml-[5px]">{{ storeStore.username }}</div>
        </div>
        <div>
          <img src="~/assets/images/bell 1.png" width="24" />
        </div>
        <div>
          <button
            class="border border-[#00000033] rounded-[20px] text-[16px] px-[18px] py-[8px]"
          >
            {{ storeStore.name }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useSessionStore } from "~/stores/session";
import { useStoreStore } from "~/stores/store";

const storeStore = useStoreStore();
const sessionStore = useSessionStore();

onMounted(() => {
  if (!sessionStore.token) {
    navigateTo("/auth/login");
  }
});
</script>