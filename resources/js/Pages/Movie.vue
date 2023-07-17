<script setup>

import MovieLayout from '@/Layouts/MovieLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Banner1 from '@/Components/Banner1.vue';
import NavBar from '@/Components/NavBar.vue';
import CarouselMovies from '../Components/CarouselMovies.vue';
import axios from 'axios';
defineProps({
   
  });

</script>
<script>
import axios from 'axios';

const options = {
  method: 'GET',
  url: 'https://moviesdatabase.p.rapidapi.com/titles/search/title/next',
  
  params: {
    exact: 'false',
    titleType: 'movie'
  },
  headers: {
    'X-RapidAPI-Key': 'e992497d5cmsh530bed812e23ad2p190014jsncbf083eb1c3d',
    'X-RapidAPI-Host': 'moviesdatabase.p.rapidapi.com'
  }
};
export default {
  data() {
    return {
      response: {
        data: {
          results: [],
        },
      },

    };
  },
  async mounted() {
    try {
      const response = await axios.request(options);
      this.response.data.results = response.data.results;
      console.log(response.data.results);
    } catch (error) {
      console.error(error);
    }
  },
};

</script>
<template>
    <MovieLayout title="Peliculas"/>
    <!-- <CarouselMovies/> -->
    
    <div>
     <!-- <p>{{response.data.results}}</p> -->
        <ul>
          <!-- <p>{{ response.data }}</p> -->
          <li v-for="item in response.data.results" :key="item.id">{{ item.originalTitleText }}</li>
        </ul>
      </div>
</template>
<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>