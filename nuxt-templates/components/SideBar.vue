<template>
  <div class="w-[250px]">
    <div v-for="item in items" :key="item">
      <SideBarItem :item="item" />
    </div>
  </div>
</template>

<script setup>
const items = ref([
  {
    image: "/_nuxt/assets/images/image 37.png",
    title: "Vận chuyển",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 38.png",
    title: "Quản Lý Đơn Hàng",
    subItems: [
      {
        title: "Tất cả",
        to: "/",
      },
      {
        title: "Đơn Hủy",
        to: "/",
      },
      {
        title: "Trả Hàng/Hoàn Tiền",
        to: "/",
      },
    ],
  },
  {
    image: "/_nuxt/assets/images/image 40.png",
    title: "Quản Lý Sản Phẩm",
    subItems: [
      {
        title: "Tất Cả Sản Phẩm",
        to: "/product",
      },
      {
        title: "Thêm Sản Phẩm",
        to: "/",
      },
      {
        title: "Sản Phẩm Vi Phạm",
        to: "/",
      },
      {
        title: "Cài Đặt Sản Phẩm",
        to: "/",
      },
    ],
  },
  {
    image: "/_nuxt/assets/images/image 46.png",
    title: "Kênh Marketing",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 45.png",
    title: "Tài Chính",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 44.png",
    title: "Dữ Liệu",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 43.png",
    title: "Phát Triển",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 42.png",
    title: "Chăm Sóc Khách",
    subItems: [],
  },
  {
    image: "/_nuxt/assets/images/image 41.png",
    title: "Quản Lý Shop",
    subItems: [
      {
        title: "Cài đặt thông tin Shop",
        to: "/admin/setting",
      },
      {
        title: "Cài đặt vận chuyển",
        to: "/",
      },
    ],
  },
]);
</script>