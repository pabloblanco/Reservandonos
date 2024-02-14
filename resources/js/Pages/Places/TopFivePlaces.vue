<script>
export default {
    name: 'PlacesTopFive'
}
</script>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
 
defineProps({
    topPlaces: {
        type: Array
    }
})
 
const columns = [
    { data: 'row_number' },
    { data: 'name' },
    { data: 'likes_count' },
    { data: 'score' }
];

const ordering = false;

</script>

<template>
    <Head title="Top Five" />

    <AuthenticatedLayout>
        <template #header>
            Places / <strong>Top Five</strong>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="p-6 text-gray-900">
                        <DataTable
                            :data="topPlaces"
                            :columns="columns"
                            :ordering="ordering"
                        >
                            <thead>
                                <tr>
                                    <th>Lugar</th>
                                    <th>Nombre</th>
                                    <th>Likes</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                        </DataTable>
                    </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>