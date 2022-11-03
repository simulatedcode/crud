<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import CarbonEdit from '~icons/carbon/edit';
import CarbonTrashCan from '~icons/carbon/trash-can';

defineProps ([
    'artists'
])

</script>
<template>
    <div class="overflow-x-auto">
        <div class="min-w-screen flex items-center justify-center bg-slate-100 overflow-hidden">
            <div class="w-full">
                <div class="bg-white overflow-hidden">
                    
                    <table class="min-w-max w-full table-auto">
                        <caption class="text-2xl text-left bg-zinc-200/70 font-semibold text-zinc-600 px-6 py-5">
                            Artists List
                            <p class="mt-1 text-sm font-normal leading-relaxed">List online archive of Indonesian Visual Art Archive.</p>
                            <p class="mt-1 text-sm font-normal leading-relaxed w-1/2">
                                Total data: {{ artists.length }} Artists
                            </p>
                        </caption>
                        <thead>
                            <tr class="text-sm leading-relaxed bg-zinc-300 border-b border-zinc-400">
                                <td class="py-3 px-6 text-left w-1/4 font-semibold">Name</td>
                                <td class="py-3 px-6 text-left font-semibold">Collective</td>
                                <td class="py-3 px-6 text-left font-semibold">Category</td>
                                <td class="py-3 px-6 text-left font-semibold">Artwork</td>
                                <td class="py-3 px-6 text-left font-semibold">Events</td>
                                <td class="py-3 px-6 text-left font-semibold">Khazanahs</td>
                                <td class="py-3 px-6 text-left font-semibold">Status</td>
                                <td class="py-3 px-6 text-center font-semibold">Action</td>
                            </tr>
                        </thead>
                        <tbody class="text-neutral-600 text-sm">
                            <tr v-for="artist in artists" :key="artist.id" class="border-b border-gray-200 hover:bg-zinc-100/60">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                <Link :href="route('artists.show', artist.id)">
                                   <p class="font-medium">{{ artist.firstname }} {{ artist.lastname}}</p>
                                </Link>
                                </td>
                                <td class="py-3 px-6 text-left">Artist</td>
                                <td class="py-3 px-6 text-left">Collective</td>
                                <td class="py-3 px-6 text-left">20 Artwork</td>
                                <td class="py-3 px-6 text-left">1 Event</td>
                                <td class="py-3 px-6 text-left">12 Khazanah</td>
                                <td class="py-3 px-6 text-left">active</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center space-x-2">
                                        <div class="w-4 mr-2 transform text-blue-700 hover:text-blue-500 hover:scale-110">
                                            <Link :href="route('artists.edit', artist.id)">
                                                <CarbonEdit/>
                                            </Link>
                                        </div>
                                        <div class="w-4 mr-2 transform text-red-700 hover:text-red-500 hover:scale-110">
                                            <Link :href="route('artists.destroy', artist.id)" method="delete" as="button" type="button">
                                                <CarbonTrashCan/>
                                            </Link>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
       
    </div>
</template>