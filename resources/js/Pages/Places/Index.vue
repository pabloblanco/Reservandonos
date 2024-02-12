<script>
export default {
    name: 'PlacesIndex'
}
</script>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    places:{type:Object}
});

</script>

<template>

    <Head title="Places" />

    <AuthenticatedLayout>
        <template #header>
            Places / <strong>Restaurantes</strong>
        </template>        

        <div class="bg-white mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
            <div class="mx-auto max-w-2xl px-2 py-8 sm:px-3 sm:py-12 lg:max-w-7xl lg:px-4">
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    <div v-for="place in places['data']" :key="place.id" class="group relative">
                        <div class="relative aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <a :href="`/get-place-by-id/${place.id}`">
                                <img :src="place.image_url" :alt="place.name" class="w-full h-auto object-cover object-center lg:h-full lg:w-full">
                            </a>
                            <a :href="`/set-lovely-place/${place.id}`">    
                                <button class="w-8 h-8 rounded-full bg-white text-red-500 px-1 py-1 absolute top-2 right-2 transform">
                                    <svg class="w-6 h-6 m-1 fill-current text-red" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="mt-4 flex justify-left items-start">
                            <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <a :href="`/get-place-by-id/${place.id}`">
                                    <img :src="place.logo_url" :alt="place.name" class="h-full w-full object-cover object-center" />
                                </a>                            
                            </div>
                            <div>
                                <a :href="`/get-place-by-id/${place.id}`">
                                    <p class="mt-1 text-md text-gray-900 text-left px-2"><strong>{{ place.name }}</strong></p>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div class="flex relative justify-start w-48 h-8 items-center px-1">
                                <div class="relative px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />                                       </svg>
                                </div>
                                <div class="relative max-h-8 line-clamp-1 text-ellipsis">
                                    <p>{{ place.categories }}</p>
                                </div>
                            </div>
                            <div class="flex relative justify-start w-48 h-8 items-center px-1">
                                <div class="relative px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <div class="relative">
                                    <p>{{ place.schedule }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div class="flex relative justify-start bg-red-700 rounded-lg w-20 h-8 items-center px-1">
                                <div class="relative px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                </div>
                                <div class="relative">
                                    <p class="px-1">{{ place.score }}</p>
                                </div>
                            </div>
                            <div class="flex relative justify-start w-48 h-8 items-center px-1">
                                <div class="relative px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <div class="relative">
                                    <p>{{ place.price_range }}</p>
                                </div>
                            </div>
                            <div class="flex relative justify-start h-8 items-center px-1">
                                <div class="relative px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                                <div class="relative max-h-8 line-clamp-1 text-ellipsis">
                                    <p>{{ place.location }}</p>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div v-if="places.showMore" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-1 xl:gap-x-8">
                        <button class="w-48 h-8 flex items-center px-4 py-2 bg-blue-500 text-white rounded-full justify-center ml-auto">
                            <a :href="`/next-page/${parseInt(places.page, 10) + 1}`">Ver más</a>
                        </button>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>  

</template>
