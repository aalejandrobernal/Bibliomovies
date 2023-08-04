<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ModalNuevo from '@/Components/ModalNuevo.vue';
</script>
<script>
import axios from 'axios';
import swal from "sweetalert2";
let formData = new FormData();
    export default {
        name:'Modmovies',
        
        data(){
            return{
                peiculas: [],
                variants: ['cnt'], 
                file: null,               
                data:{
                    titulo: '',
                    audiencia: '',
                    topografico: '',
                    descripcion: '',
                    tipo_material: '',
                    publico: '',
                    categoria: '',
                    file: null,
                    
                },
               currenpage: 1,
               pages:'',
               total:'',
        }
        },
        async mounted(){
            await this.getNoticias();
            
        },
       methods:{
        async getNoticias(page){
            page = page || this.currenpage;
            await axios.get('/mov?page='+page)
            .then((response) =>{
                this.peiculas=response.data.data;
                this.currenpage=response.data.current_page;
                this.pages=response.data.last_page;
                this.total=response.data.total;
                
            
            })
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
                axios.post('/modificarmovie', formData)
                .then((res) => { })
                .catch((err) => console.log(err))
            },
            validateImg() {
                if (this.data.file === null) {
                    this.errorMessage3 = 'no se ha cargado alguna imagen';
                    return false;
                }
                    this.errorMessage = '';
                    return true;
            },
            ObtenerImagen(e){
                this.data.file = e.target.files[0] ;
                this.CargarImage(this.data.file);
            },
            CargarImage(files){
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.data.file = e.target.result;
                };
                reader.readAsDataURL(files);
                for(let key in this.data){
                    formData.append(key, this.data[key]);
                    console.log(key + '-> ' + this.data[key]);
                }
                // if(this.data.img != null){
                //     this.data.img = formData;
                // }
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
                
                <button class="btn" onclick="my_modal_1.showModal()">Nuevo material</button>
                <dialog id="my_modal_1" class="modal">
                <form method="dialog" @submit="onSubmit" class="modal-box w-11/12 max-w-5xl">
                    <h3 class="font-bold text-lg">hola
                    </h3>
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
                            </div>
                            <p class="text-white-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-first-name">
                                imagen
                            </label>
                            <div class="flex items-center border-b border-red-500 py-2">
                                <input type="file"  
                                @input="validateImg" 
                                @change="ObtenerImagen" 
                                accept="image/*"
                                required
                                class="file-input w-full max-w-xs" />
                            </div>
                            <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3" v-if="data.file">
                            <div class="avatar">
                                <div class="w-24 rounded">
                                    <img :src="data.file"/>
                                </div>
                            </div>
                        </div>
                        <div v-else class="w-full md:w-1/2 px-3" >
                            <div class="avatar">
                                <div class="w-24 rounded">
                                  <img src="storage/images/fotonone.svg"/>
                                </div>
                            </div>
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
                                         <ModalNuevo :Modalid="item.id" :data="item"/>
                                    </td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                    
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                      <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                      <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                      <div>
                        <p class="text-sm text-gray-700">
                         pagina
                          <span class="font-medium">{{currenpage}}</span>
                          de
                          <span class="font-medium">{{pages}}</span>
                          de
                          <span class="font-medium">{{total}}</span>
                          resultados
                        </p>
                      </div>
                      <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                          <a @click="getNoticias(currenpage-1)" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Anterior</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                          </a>
                          <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                          <a  @click="getNoticias(page)" aria-current="page" v-for="page in pages" v-bind:key="page" v-bind:class="{'relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600': page==currenpage}"  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{page}}</a>
                          
                          
                          <a @click="getNoticias(currenpage+1)" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Proximo</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                          </a>
                        </nav>
                      </div>
                    </div>
                  </div>
            </div>
            
        </div>
    <!-- </MovieLayout> -->
    
    </AppLayout>
</template>
