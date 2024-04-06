<template>
  <div class="w-[1440px] mx-auto bg-white">
    <LayoutsAdminHeader />
    <div class="flex">
      <SideBar />
      <slot />
    </div>
    <LayoutsAdminFooter />
  </div>
</template>

<script setup>
</script>