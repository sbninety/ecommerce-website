<template>
  <div class="max-w-[500px] w-full py-[30px]">
    <div>
      <img :src="displayImage" width="450" class="mx-auto" />
    </div>
    <div class="relative mt-1">
      <div id="Gallery" class="overflow-hidden mx-5">
        <div id="Slider" class="flex transition-margin duration-700 gap-0.5">
          <div v-for="(image, index) in images" :key="index">
            <li
              class="list-none w-[92px]"
              :class="indexImage === index ? 'border border-red-500' : ''"
              @click="indexImage = index"
            >
              <img :src="image.path" width="92" />
            </li>
          </div>
        </div>
      </div>
      <div
        id="NextButton"
        @click="next()"
        class="absolute bg-white border border-[#00000033] rounded-full right-5 top-5"
        :class="indexImage === images.length - 1 ? 'hidden' : ''"
      >
        <button class="p-2">
          <img src="~/assets/images/next 1.png" width="24" />
        </button>
      </div>
      <div
        id="PrevButton"
        @click="prev()"
        class="absolute bg-white border border-[#00000033] rounded-full left-5 top-5"
        :class="indexImage === 0 ? 'hidden' : ''"
      >
        <button class="p-2">
          <img src="~/assets/images/next 1.png" width="24" class="rotate-180" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(["images"]);
const { images } = toRefs(props);

const container = ref(null);
const slider = ref(null);
const prevButton = ref(null);
const nextButton = ref(null);
const items = ref(null);
const itemWidth = ref(null);
const itemsPerSlide = ref(5);
const startIndex = ref(0);
const lastIndex = ref(itemsPerSlide.value - 1);

const indexImage = ref(0);

const displayImage = computed(() => {
  return images.value[indexImage.value].path;
});

onMounted(() => {
  container.value = document.getElementById("Gallery");
  slider.value = document.getElementById("Slider");
  prevButton.value = document.getElementById("PrevButton");
  nextButton.value = document.getElementById("NextButton");
  items.value = slider.value.getElementsByTagName("li");

  let sliderContainerWidth = container.value.clientWidth;

  itemWidth.value = sliderContainerWidth / itemsPerSlide.value;
  slider.value.style.width = items.value.length * itemWidth.value + "px";

  for (let index = 0; index < items.value.length; index++) {
    const element = items.value[index];
    element.style.width = itemWidth.value + "px";
  }
});

const next = () => {
  indexImage.value++;
  if (indexImage.value > lastIndex.value) {
    startIndex.value++;
    lastIndex.value++;
    slider.value.style.marginLeft =
      +slider.value.style.marginLeft.slice(0, -2) - itemWidth.value + "px";
  }
};

const prev = () => {
  indexImage.value--;
  if (indexImage.value < startIndex.value) {
    startIndex.value--;
    lastIndex.value--;
    slider.value.style.marginLeft =
      +slider.value.style.marginLeft.slice(0, -2) + itemWidth.value + "px";
  }
};
</script>