<script>
export default {
    name: 'PlacesShow'
}
</script>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import ModalBooking from '@/Components/ModalBooking.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({});
const props = defineProps({
    place:{type:Object}
});

const confirmBooking = (place) =>{
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling:true
    })
    swalWithBootstrapButtons.fire({
        title:'Seguro que desea activar la película '+place.data.logo_img,
        text:'Se activará la película',
        icon:'question',
        showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, activar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            
        }
    })
};

const openModal = (place) => {

}

</script>

<template>

    <Head title="Place" />

    <AuthenticatedLayout>

        <template #header>
            Inicio  /  Filtro  /  <strong>Restaurante</strong>
        </template>        

        <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
            <div class="w-full px-4 py-2 ">
                <div class="flex justify-between items-center">
                    <div class="relative">
                        <div class="w-full px-4 py-2 ">
                            <div class="flex items-center">
                                <div class="relative h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <a :href="`/get-place-by-id/${place.id}`">
                                        <img v-bind:src="place.data.logo_img" v-bind:alt="place.data.name">
                                    </a>                            
                                </div>
                                <div class="relative mx-3">
                                    <h3 class="mb-4 text-3xl font-medium text-gray-700">
                                        {{ place.data.name }}
                                    </h3>
                                </div>        
                            </div>    
                        </div>                  
                    </div>
                    <div class="relative">    
                        <a :href="`/set-lovely-place/${place.id}`">    
                            <button class="w-8 h-8 rounded-full bg-white text-red-700 px-1 py-1 transform border-2 border-red-700 mx-3 m-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-6 h-6 fill-current">
                                    <path d="M13 4.5a2.5 2.5 0 1 1 .702 1.737L6.97 9.604a2.518 2.518 0 0 1 0 .792l6.733 3.367a2.5 2.5 0 1 1-.671 1.341l-6.733-3.367a2.5 2.5 0 1 1 0-3.475l6.733-3.366A2.52 2.52 0 0 1 13 4.5Z" />
                                </svg>
                            </button>
                        </a>                                            
                        <a :href="`/set-lovely-place/${place.id}`">    
                            <button class="w-8 h-8 rounded-full bg-white text-red-700 px-1 py-1 transform border-2 border-red-700">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
            <div class="mx-auto grid max-w-2xl grid-cols-1 items-start gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"></h2>
                    <div v-html="place.data.description"></div>
                </div>  
                <div>
                    <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                        <img :src="place.data.gallery[0].file" alt="" class="rounded-lg bg-gray-100" />
                        <img :src="place.data.gallery[1].file" alt="" class="rounded-lg bg-gray-100" />
                        <img :src="place.data.gallery[2].file" alt="" class="rounded-lg bg-gray-100" />
                        <div class="relative">
                            <img :src="place.data.gallery[3].file" alt="" class="rounded-lg bg-gray-100" />
                            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50 flex items-center justify-center rounded-lg">
                                <p class="text-white text-4xl">+{{ place.data.gallery.length - 4 }}</p>
                            </div>
                        </div>
                    </div>
                    <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8 py-3">
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="font-medium text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Horarios
                            </dt>
                            <dd v-for="hour in place.data.schedules" class="mt-2 text-sm text-gray-500">
                                <div class="flex justify-between">
                                    <div class="relative">{{ hour.weekday }}</div>
                                    <div class="relative">{{ hour.start }} - {{ hour.end }}</div> 
                                </div>
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4 py-3">
                            <dt class="font-medium text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                Amenidades
                            </dt>
                            <dd v-for="amenity in place.data.amenities" class="mt-2 text-sm text-gray-500">{{ amenity.name }}</dd>
                        </div>                                
                    </dl>
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-start">
                            <div class="relative px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"></path>
                                </svg>
                            </div>
                            <div class="relative">
                                Como llegar
                            </div>
                        </div>
                        <div class="rounded-lg py-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14929.35697332112!2d-103.35125471290287!3d20.696444410280648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1707615675717!5m2!1ses-419!2smx" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <div class="fixed bottom-4 right-4 flex items-center space-x-2 bg-red-700 text-white px-4 py-2 rounded-full">
            <button class="btn btn-warning items-center" data-bs-toggle="modal" data-bs-target="#modalBooking" @click="openModal(place)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                <p class="text-sm">Reservar</p>
            </button>
        </div>

        <ModalBooking :modal="'modalBooking'" :title="'Hacer reserva'" :op="'2'"></ModalBooking>

    </AuthenticatedLayout>  
</template>