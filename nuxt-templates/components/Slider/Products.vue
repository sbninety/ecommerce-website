<template>
  <div id="Categories" class="relative">
    <div
      :id="`Container${type}`"
      class="max-w-[1200px] w-full mx-auto bg-white overflow-hidden"
    >
      <div class="font-bold text-[24px] pl-2.5 py-4">
        <p>{{ title }}</p>
      </div>
      <div :id="`Slider${type}`" class="flex transition-margin duration-700">
        <div v-for="product in products" :key="product">
          <li class="list-none w-[300px]">
            <CardProduct :product="product" />
          </li>
        </div>
      </div>
    </div>
    <div
      :id="`NextButton${type}`"
      @click="next()"
      class="absolute w-[30px] h-[30px] border border-[#00000033] rounded-full 2xl:right-[105px] top-[250px] right-0"
    >
      <button class="p-[3px]">
        <img src="~/assets/images/next 1.png" width="24" />
      </button>
    </div>
    <div
      :id="`PrevButton${type}`"
      @click="prev()"
      class="absolute w-[30px] h-[30px] border border-[#00000033] rounded-full 2xl:left-[105px] top-[250px] left-0"
    >
      <button class="p-[3px]">
        <img src="~/assets/images/next 1.png" width="24" class="rotate-180" />
      </button>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(["products", "itemsPerSlide", "type", "title"]);
const { products, itemsPerSlide, type, title } = toRefs(props);

const container = ref(null);
const slider = ref(null);
const prevButton = ref(null);
const nextButton = ref(null);
const items = ref(null);
const itemWidth = ref(null);

onMounted(() => {
  container.value = document.getElementById(`Container${type.value}`);
  slider.value = document.getElementById(`Slider${type.value}`);
  prevButton.value = document.getElementById(`PrevButton${type.value}`);
  nextButton.value = document.getElementById(`NextButton${type.value}`);
  items.value = slider.value.getElementsByTagName("li");

  let sliderContainerWidth = container.value.clientWidth;

  itemWidth.value = sliderContainerWidth / itemsPerSlide.value;
  slider.value.style.width = items.value.length * itemWidth.value + "px";

  for (let index = 0; index < items.value.length; index++) {
    const element = items.value[index];
    element.style.width = itemWidth.value + "px";
  }
  if (+slider.value.style.marginLeft.slice(0, -2) == 0) {
    prevButton.value.style.visibility = "hidden";
  }
});

const next = () => {
  if (
    +slider.value.style.marginLeft.slice(0, -2) !=
    -itemWidth.value * (items.value.length - itemsPerSlide.value)
  ) {
    prevButton.value.style.visibility = "visible";
    slider.value.style.marginLeft =
      +slider.value.style.marginLeft.slice(0, -2) - itemWidth.value + "px";
  }
  if (
    +slider.value.style.marginLeft.slice(0, -2) ==
    -itemWidth.value * (items.value.length - itemsPerSlide.value)
  ) {
    nextButton.value.style.visibility = "hidden";
  }
};

const prev = () => {
  if (+slider.value.style.marginLeft.slice(0, -2) != 0) {
    prevButton.value.style.visibility = "visible";
    slider.value.style.marginLeft =
      +slider.value.style.marginLeft.slice(0, -2) + itemWidth.value + "px";
  }
  if (+slider.value.style.marginLeft.slice(0, -2) == 0) {
    prevButton.value.style.visibility = "hidden";
  }
  if (
    +slider.value.style.marginLeft.slice(0, -2) !=
    -itemWidth.value * (items.value.length - itemsPerSlide.value)
  ) {
    nextButton.value.style.visibility = "visible";
  }
};
</script>