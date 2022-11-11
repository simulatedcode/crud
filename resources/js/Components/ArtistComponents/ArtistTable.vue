<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import CarbonEdit from '~icons/carbon/edit';
import CarbonTrashCan from '~icons/carbon/trash-can';
import CarbonCircleSolid from '~icons/carbon/circle-solid';
import moment from 'moment';

defineProps({
    artists: Object
})

</script>

<template>
    <div class="overflow-x-auto">
        <div class="min-w-screen flex items-center justify-center bg-slate-100 overflow-hidden">
            <div class="w-full">
                <div class="bg-white overflow-hidden">
                    
                    <table class="min-w-max w-full table-auto">
                        <caption class="py-5 px-6 text-2xl text-left bg-zinc-200/70 font-semibold text-zinc-600">
                            Artists List
                            <p class="mb-6 text-sm font-normal leading-relaxed">List of Artist in Archive IVAA</p>
                        </caption>
                        <thead>
                            <tr class="text-sm leading-relaxed bg-zinc-300 border-b border-zinc-400">
                                <td class="border py-3 px-6 text-left font-semibold">ID</td>
                                <td class="border py-3 px-6 text-left font-semibold">Name</td>
                                <td class="border py-3 px-6 text-left font-semibold">Category</td>
                                <td class="border py-3 px-6 text-left font-semibold">Collective</td>
                                <td class="border py-3 px-6 text-left font-semibold">Artwork</td>
                                <td class="border py-3 px-6 text-left font-semibold">Events</td>
                                <td class="border py-3 px-6 text-left font-semibold">Khazanahs</td>
                                <td class="border py-3 px-6 text-left font-semibold">Created</td>
                                <td class="border py-3 px-6 text-center font-semibold">Status</td>
                                <td class="border py-3 px-6 text-center font-semibold">Action</td>
                            </tr>
                        </thead>
                        <tbody class="text-neutral-600 text-sm">
                            <tr v-for="artist in artists.data" :key="artist.id" class="border-b border-gray-200 hover:bg-zinc-100/60">
                                <td class="border py-3 px-6 text-left">{{artist.id}}</td>
                                <td class="border py-3 px-6 text-left whitespace-nowrap">
                                <Link :href="route('artists.show', artist.id)">
                                   <p class="font-medium">{{artist.firstname}} {{artist.lastname}}</p>
                                </Link>
                                </td>
                                <td class="border py-3 px-6 text-left"></td>
                                <td class="border py-3 px-6 text-left"></td>
                                <td class="border py-3 px-6 text-left"></td>
                                <td class="border py-3 px-6 text-left"></td>
                                <td class="border py-3 px-6 text-left"></td>
                                
                                <td class="font-mono border py-3 px-6 text-left">{{moment(artist.created_at).format('ddd, DD/MM/YYYY')}}</td>
                                <td class="border-hidden py-3 px-6 text-center flex items-center" :style="{ color: artist.is_active ? '#0f62fe' : '#da1e28' }" >
                                   <CarbonCircleSolid class=" mr-2 h-2 w-2" :style="{ color: artist.is_active ? '#42be65' : '#fa4d56'}" /> {{ artist.is_active ? 'Active' : 'Inactive' }}
                                </td>
                                
                                <td class="border py-3 px-6 text-center">
                                    <div class="flex item-center justify-center space-x-2">
                                        <div class="w-4 mr-2 transform text-blue-700 hover:text-blue-500 hover:scale-110">
                                            <Link :href="route('artists.edit', artist.id)" preserve-scroll>
                                                <CarbonEdit/>
                                            </Link>
                                        </div>
                                        <div class="w-4 mr-2 transform text-red-700 hover:text-red-500 hover:scale-110">
                                            <Link :href="route('artists.destroy', artist.id)" method="delete" as="button" type="button" preserve-scroll>
                                                <CarbonTrashCan/>
                                            </Link>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <!--Pagination-->
                        <div class="font-mono relative bg-zinc-100/80 border">
                            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between py-6 px-6">
                                <div class="inline-flex justify-start mr-60">
                                    <p class="text-sm font-normal leading-relaxed">
                                        <span v-if="artists.per_page" class="mr-2">Total per page:</span>{{ artists.per_page }} artists
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-700">
                                        {{ artists.from }}-{{ artists.to }} of {{ artists.total }} artists
                                    </p>
                                </div>
                                <div class="flex mr-12">
                                    <p class="text-sm text-zinc-700">
                                        
                                        <span :is="artists.current_page ? 'Link' : 'span'" :class="{ 'text-gray-500': ! artists.current_page, 'font-medium' : artists.current_page }">
                                        {{ artists.current_page }}
                                        </span>
                                        of {{ artists.last_page }}
                                      
                                    </p> 
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <Link v-if="artists.prev_page_url" :href="artists.prev_page_url" class="text-sm hover:text-zinc-700" preserve-scroll>Prev</Link>
                                    <Link v-if="artists.next_page_url" :href="artists.next_page_url" class="text-sm hover:text-zinc-700" preserve-scroll>Next</Link>
                                </div>

                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>