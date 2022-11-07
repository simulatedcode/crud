<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArtistTable from '@/Components/ArtistComponents/ArtistTable.vue';
import {Link} from '@inertiajs/inertia-vue3';
import {ref, watch} from 'vue';
import { Inertia } from '@inertiajs/inertia';
import CarbonSearch from '~icons/carbon/search'


let props = defineProps ({
    artists: Object,
    filters: Object,
})

let search = ref (props.filters.search);

watch (search, value => {
    Inertia.get ('/artists', {search: value}, {
        preserveState: true,
        replace: true,
    });
})
</script>

<template>
    <AppLayout title="Artists">
        <template #header>
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                Artists Page
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end items-center">
                    <form class="flex items-center">
                        <CarbonSearch class="absolute inset-x-auto my-auto ml-4 w-6 h-6"/>
                        <input v-model="search" placeholder="search..." type="search"
                                class="relative peer z-50 bg-transparent w-12 h-12 cursor-pointer pl-10 border-hidden outline-none focus:pl-12 focus:outline-none focus:w-full focus:cursor-text">
                    </form>
                    <div class="bg-blue-600 px-4 py-3">
                        <Link :href="route('artists.create')" class="text-white hover:text-blue-100 mr-6 text-sm">
                            Add Artist
                        </Link>
                    </div>
                    
                </div>
                <div class="overflow-hidden">
                   <ArtistTable :artists="artists"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
