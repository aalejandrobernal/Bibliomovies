<template>
    <Carousel :autoplay="2000" :wrap-around="true">
      <Slide v-for="slide in 10" :key="slide">
        <div class="carousel__item"><img src="https://picsum.photos/1024/480/?image=52" alt=""></div>
      </Slide>
  
      <template #addons>
        <Pagination />
      </template>
    </Carousel>
  </template>
  
  <script>
  import { defineComponent } from 'vue'
  import { Carousel, Pagination, Slide } from 'vue3-carousel'
  
  import 'vue3-carousel/dist/carousel.css'
  
  export default defineComponent({
    name: 'Autoplay',
    components: {
      Carousel,
      Slide,
      Pagination,
    },
  })
  </script>