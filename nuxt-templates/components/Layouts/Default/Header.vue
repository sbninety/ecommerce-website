<template>
  <div id="TopMenu" class="w-full bg-[#007006] h-[70px]">
    <div class="max-w-[1200px] mx-auto flex h-full">
      <div class="h-full w-1/2 flex items-center gap-[30px]">
        <NuxtLink class="text-white text-[14px]">Kênh người bán</NuxtLink>
        <NuxtLink class="text-white text-[14px]"
          >Trở thành người bán hàng</NuxtLink
        >
      </div>
      <div class="h-full w-1/2 flex items-center justify-end gap-[30px]">
        <NuxtLink class="text-white text-[14px]">Thông báo</NuxtLink>
        <NuxtLink class="text-white text-[14px]">Hỗ trợ</NuxtLink>
        <NuxtLink class="text-white text-[14px]">Đăng ký</NuxtLink>
        <NuxtLink class="text-white text-[14px]">Đăng nhập</NuxtLink>
      </div>
    </div>
  </div>
  <div
    id="Header"
    class="w-full bg-white/95 h-[125px] border-b border-white/95"
  >
    <div class="max-w-[1200px] w-full h-full mx-auto flex justify-between">
      <div class="h-full flex items-center">
        <NuxtLink to="/">
          <img src="~assets/images/logo.png" width="227.42" />
        </NuxtLink>
      </div>
      <div class="h-full flex items-center w-[700px]">
        <div
          class="border border-black/20 rounded relative bg-white/80 w-full mt-2 h-[50px] flex"
        >
          <input
            type="text"
            class="flex-1 px-3 focus:outline-none rounded"
            placeholder="search....."
          />
          <button class="bg-[#007006] px-[28px] my-1 mr-[6px]">
            <img
              src="~/assets/images/search-interface-symbol 1.png"
              width="24"
            />
          </button>
        </div>
      </div>
      <div class="h-full flex items-center mr-[81px]">
        <button>
          <img src="~/assets/images/cart.png" width="42" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
</script>