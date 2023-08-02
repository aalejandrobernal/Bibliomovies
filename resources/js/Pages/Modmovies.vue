<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import MovieLayout from '@/Layouts/MovieLayout.vue';
</script>
<script>
import axios from 'axios';
import swal from "sweetalert2";
    export default {
        name:'Modmovies',
        data(){
            return{
                peiculas: [],
                variants: ['cnt'],                
                data:{
                    titulo: '',
                    audiencia: '',
                    topografico: '',
                    descripcion: '',
                    tipo_material: '',
                    publico: '',
                    categoria: '',
                }
                
        }
        },
        created(){
            this.getNoticias(); 
             
       },
       methods:{
           getNoticias(){
            axios.get('/mov')
            .then((res) => this.peiculas=res.data)
            // .then((res) => console.log(res))
            .catch((err) => console.log(err))
           },
           onSubmit(event) {
            // event.preventDefault();
            // if(res){
            this.ActualizarPass();
            // swal.fire({
            //     icon : "success",
            //     title: "La contraseña se ha actualizado correctamente",
            //     allowEscapeKey: false,
            //     allowOutsideClick: false,
            //     showConfirmButton: true,
            // });
                // }
                // else{
                //     swal.fire({
                //     icon : "error",
                //     title: "La contraseña no se ha actualizado ",
                //     allowEscapeKey: false,
                //     allowOutsideClick: false,
                //     showConfirmButton: true,
                //                 });
                // }
            
           },
           ActualizarPass(){
                
                console.log(this.data);
                axios.post('/modificarmovie', this.data)
                .then((res) => { })
                .catch((err) => console.log(err))
            },
       },
    }
   

</script>
<template>
    <AppLayout title="Dashboard">
    <!-- <MovieLayout title="Dashboard"> -->
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
                <!-- ***************************************************** -->
                <button class="btn" onclick="my_modal_1.showModal()">open modal</button>
                <dialog id="my_modal_1" class="modal">
                <form method="dialog" @submit="onSubmit" class="modal-box w-11/12 max-w-5xl">
                    <h3 class="font-bold text-lg">Hello!</h3>
                    <div class="flex flex-wrap -mx-3 mb-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                                TÍTULO
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                                id="grid-titulo" 
                                type="text" 
                                placeholder="Ingrese el título" 
                                aria-label="Full name"
                                v-model="data.titulo"
                                required
                                >
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="">
                            Audencia
                        </label>
                        <div class="flex items-center border-b border-red-500 py-2">
                            <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                            id="grid-Audencia" 
                            type="text" 
                            placeholder="Ingrese la audencia" 
                            aria-label="Full name"
                            v-model="data.audiencia"
                            >
                        </div>
                        <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                                TOPOGRAFICO
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                                id="grid-topografico" 
                                type="text" 
                                placeholder="Ingrese el tpografico" 
                                aria-label="Full name"
                                v-model="data.topografico"
                                required
                                >
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-last-name">
                                TIPO DE MATERIAL
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                                id="grid-first-name" 
                                type="text" 
                                placeholder="Ingrese tipo de material" 
                                aria-label="Full name"
                                v-model="data.tipo_material"
                                >
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                                PÚBLICO
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                                id="grid-topografico" 
                                type="text" 
                                placeholder="Ingrese el público" 
                                aria-label="Full name"
                                v-model="data.publico"
                                required
                                >
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-last-name">
                                trailer
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" 
                                id="grid-first-name" 
                                type="text" 
                                placeholder="Ingrese el id del trailer" 
                                aria-label="Full name"
                                v-model="data.trailer">
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                                CATEGORIA
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <select class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="grid-state"
                                v-model="data.categoria"
                                placeholder="Ingrese el id del trailer"
                                required
                                >
                                    <option>otros</option>
                                    <option>acción</option>
                                    <option>terror</option>
                                    <option>anime</option>
                                    <option>infantil</option>
                                    <option>drama</option>
                                    <option>comedia</option>
                                    <option>musical</option>
                                    <option>suspenso</option>
                                    <option>ficción</option>
                                    <option>romance</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                              </div>
                        </div>
                        
                    </div>
                     <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                      <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-password">
                                        descripción
                                      </label>
                                      <div class="flex items-center border-b border-red-500 py-2">
                                        <textarea class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        v-model="data.descripcion"
                                        ></textarea>
                                      <!-- <input class="appearance-none bg-transparent border-none w-full text-white-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="grid-password" type="password" placeholder="******************"> -->
                                    </div>
                                      <p class="text-white-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                                    </div>
                                  </div>
                    <div class="modal-action">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Guardar</button>
                    </div>
                </form>
                </dialog>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="relative overflow-x-auto">
                    
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        topografico
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        titúlo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        audencia
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Público
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        tipo de material
                                    </th>
                                    
                                    <th scope="col" class="px-2 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Trailer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            

                            <tbody v-for="item in peiculas" :key="item.id" >
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ item.topografico}}
                                    </th>
                                    <!-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ item.TITULO }}
                                    </th> -->
                                    <td class="px-6 py-2">
                                        {{ item.titulo }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ item.audiencia }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ item.publico }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ item.tipo_material}}
                                    </td>
                                    
                                    <td class="px-4 py-2">
                                        {{ item.categoria }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ item.trailer }}
                                    </td>
                                    <td class="px-6 py-2">
                                        <button class="btn" :onclick="'my_modal_'+item.id+'.showModal()'">open modal</button>
                                        <dialog :id="'my_modal_'+item.id" class="modal">
                                        <form method="dialog" class="modal-box">
                                            <h3 class="font-bold text-lg">Hello!</h3>
                                            <p class="py-4">Press ESC key or click the button below to close</p>
                                            <div class="modal-action">
                                            <!-- if there is a button in form, it will close the modal -->
                                            <button class="btn">Close</button>
                                            </div>
                                        </form>
                                        </dialog>
                                    
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- </MovieLayout> -->
    
    </AppLayout>
</template>
