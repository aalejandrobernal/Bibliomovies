<template>
  <div class="pelicula-principal">
			<div class="contenedor">
				<h3 class="titulo">Interestellar</h3>
				<p class="descripcion">
					Narra las aventuras de un grupo de exploradores que hacen uso de un agujero de gusano recientemente descubierto para superar las limitaciones de los viajes espaciales tripulados y vencer las inmensas distancias que tiene un viaje interestelar.
				</p>
				<button role="button" class="boton"><i class="fas fa-info-circle"></i>Más información</button>
			</div>
		</div>		
    <!-- <Carousel :autoplay="5000" :wrap-around="true">
      <Slide v-for="slide in 1" :key="slide">
        <div style="width: 100% ; height: " class="carousel__item">
          <img  src="https://picsum.photos/1024/480/?image=52" alt="">
        </div>
      </Slide>
      <template #addons>
        <Pagination />
      </template>
    </Carousel> -->
  </template>
  
  <script>
  import { defineComponent } from 'vue'
  // import { Carousel, Pagination, Slide } from 'vue3-carousel'  
  // import 'vue3-carousel/dist/carousel.css'
  
  export default defineComponent({
    name: 'Autoplay',
    components: {
      // Carousel,
      // Slide,
      // Pagination,
    },
  })
  </script>
  <style>
.pelicula-principal {
	font-size: 16px;
	min-height: 40.62em;
	color: #fff;
	background: linear-gradient(rgba(0, 0, 0, .50) 0%, rgba(0,0,0,.50) 100%), url(https://picsum.photos/1024/480/?image=52);
	background-position: center center;
	background-size: cover;
	margin-bottom: 3.12em;
	display: flex;
	align-items: flex-end;
}
</style>