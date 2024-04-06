<template>
  <div id="Slider" class="py-[30px]">
    <div class="max-w-[1200px] w-full mx-auto">
      <div class="relative w-full flex justify-center">
        <Transition name="fade" mode="out-in">
          <img
            :src="displayImage"
            :key="displayImage"
            class="transition-opacity duration-500"
          />
        </Transition>
        <div class="absolute bottom-4 flex gap-[13px]">
          <div
            v-for="(image, i) in images"
            :key="image"
            @click="changeDisplayImage(i)"
            class="w-[15px] h-[15px] rounded-full border border-black hover:cursor-pointer"
            :class="imageIndex === i ? 'bg-[#007006]' : 'bg-[#D9D9D9]'"
          />
        </div>
      </div>
      <div class="bg-white flex">
        <div
          class="ml-[50px] mt-[30px] mb-[14px] flex gap-2.5 w-[400px] h-[64px]"
        >
          <div>
            <img src="~/assets/images/image 15.png" width="56" />
          </div>
          <div>
            <p class="text-[18px]">7 ngày miễn phí trả hàng</p>
            <p class="text-[12px] text-[#00000099] mt-2.5">
              Trả hàng miễn phí trong 7 ngày
            </p>
          </div>
        </div>
        <div
          class="ml-[-50px] mt-[30px] mb-[14px] flex gap-2.5 w-[400px] h-[64px]"
        >
          <div>
            <img src="~/assets/images/image 16.png" width="56" />
          </div>
          <div>
            <p class="text-[18px]">Hàng chính hãng 100%</p>
            <p class="text-[12px] text-[#00000099] mt-2.5">
              Đảm bảo hàng chính hãng hoặc hoàn tiền gấp đôi
            </p>
          </div>
        </div>
        <div class="mt-[30px] mb-[14px] flex gap-2.5 w-[400px] h-[64px]">
          <div>
            <img src="~/assets/images/image 17.png" width="56" />
          </div>
          <div>
            <p class="text-[18px]">Miễn phí vận chuyển</p>
            <p class="text-[12px] text-[#00000099] mt-2.5">
              Giao hàng miễn phí toàn quốc
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const images = ref([
  "https://picsum.photos/id/8/1200/553",
  "https://picsum.photos/id/9/1200/553",
  "https://picsum.photos/id/10/1200/553",
]);

const imageIndex = ref(0);

const displayImage = ref(images.value[imageIndex.value]);

onMounted(() => {
  setInterval(() => {
    imageIndex.value = (imageIndex.value + 1) % images.value.length;
    displayImage.value = images.value[imageIndex.value];
  }, 5000);
});

const changeDisplayImage = (i) => {
  imageIndex.value = i;
  displayImage.value = images.value[imageIndex.value];
};
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>