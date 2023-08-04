<script setup>
import { defineProps } from 'vue';

defineProps({
    Modalid: Number,
    data: Object,
    
});
</script>
<script>
import axios from 'axios';
let formData = new FormData();
 export default {
    name:'Modmovies1',
    data(){
        return{
            // Modalid: 0,
            ImageData: {
                img: null,
               
            },
        }
    },
    // async mounted(){
    //        for(let key in this.dataNuevo){
    //             this.dataNuevo[key] = this.data[key];
    //             this.dataNuevo['file'] = this.data['img'];
    //             this.Modalid = this.data['id'];
    //             this.dataNuevo['topografico'] = this.data['topografico'];
    //             this.dataNuevo['tipo_material'] = this.data['tipo_material'];
    //             this.dataNuevo['publico'] = this.data['publico'];
    //             this.dataNuevo['categoria'] = this.data['categoria'];
    //             this.dataNuevo['audiencia'] = this.data['audiencia'];
    //             this.dataNuevo['descripcion'] = this.data['descripcion'];


    //         }
            
            
    //     },
    methods:{
        onSubmit(){
            this.ActualizarPass();
            
        },
        ActualizarPass(){
            //  console.log(formData.get('titulo'));
            axios.put('/modifiMov', this.data)
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
    }
 }
 
</script>

<template>
    <button class="btn" :onclick="'my_modal_'+Modalid+'.showModal()'">Editar material</button>
    <dialog :id="'my_modal_'+Modalid" class="modal">
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
                        class="file-input w-full max-w-xs" />
                    </div>
                    <p class="text-red-500 text-xs italic">Por favor rellene este campo.</p>
                </div>
                <div class="w-full md:w-1/2 px-3" v-if="data.img">
                    <div class="avatar">
                        <div class="w-24 rounded">
                            <img :src="'storage/images/img/'+data.img"/>
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
</template>
