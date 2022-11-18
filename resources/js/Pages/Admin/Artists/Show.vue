<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import moment from 'moment';
import AppLayout from '@/Layouts/AppLayout.vue';
import CarbonDocumentPdf from '~icons/carbon/document-pdf';
import CarbonArrowLeft from '~icons/carbon/arrow-left';
import CarbonEdit from '~icons/carbon/edit';
import CarbonTimer from '~icons/carbon/timer';
import CarbonCircleSolid from '~icons/carbon/circle-solid';


defineProps({
    artist: Object
})

</script>

<template>
    <AppLayout title="Artists">
        <template #header>
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                Artist Details
            </h2>
        </template>

        <div class="py-28">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <button class="overflow-hidden text-left px-6 py-4 border-t-2 border-blue-600 bg-white text-lg font-medium leading-6 text-gray-900 hover:bg-zinc-100">
                    Basic Information
                    <p class="text-left text-sm text-gray-500">Personal details and application.</p>
                </button>
                <button class="cursor-not-allowed overflow-hidden text-left px-6 py-4 border-l border-zinc-300 bg-zinc-200/70 text-lg font-medium leading-6 text-gray-900 hover:bg-zinc-100">
                    Gallery
                    <p class="text-left text-sm text-gray-500">Personal artwork</p>
                </button>
                    
                <div class="overflow-hidden bg-white">

                    <div class="flex justify-between">
                        <div class="px-4 py-4 sm:px-6">
                        <div class="flex">
                                <div class="flex flex-1 space-x-1">
                                    <CarbonTimer class="text-gray-500"/><p class="max-w-2xl text-sm text-gray-500">Last edit: {{moment($page.props.artist.updated_at).format('D MMM YYYY h:mm a')}}</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="inline-flex">
                            <Link :href="route('artists.index')" as="button" type="button" class="p-4   hover:text-gray-600 flex items-center">
                                <CarbonArrowLeft class="text-lg"/>
                            </Link>
                            <Link :href="route('artists.edit', artist.id)" as="button" type="button" class="p-4 hover:text-gray-600 flex items-center">
                                <CarbonEdit class="text-lg"/>
                            </Link>
                            <div class="p-4 text-white flex items-center" :style="{ background: artist.is_active ? '#0f62fe' : '#f4f4f4', color: artist.is_active ? 'white' : 'black'  }">
                                <CarbonCircleSolid class="items-center mr-2 text-xs text-green-400" :style="{ color: artist.is_active ? '#42be65' : '#fa4d56'}"/>{{ artist.is_active ? 'Active' : 'Inactive' }}
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-zinc-200">
                        <dl v-if="artist">
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 leading-loose sm:col-span-2 sm:mt-0">{{$page.props.artist.firstname}} {{$page.props.artist.lastname}}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Birth of date</dt>
                                <dd class="mt-1 text-sm font-mono text-gray-900 sm:col-span-2 sm:mt-0">{{ moment($page.props.artist.bod).format('D MMM YYYY') }}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Died of date</dt>
                                <dd class="mt-1 text-sm font-mono text-gray-900 sm:col-span-2 sm:mt-0">{{$page.props.artist.dod}}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Category</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                   
                                </dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Collective</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$page.props.artist.collective}}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Event</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$page.props.artist.event }}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">About</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$page.props.artist.description}}</dd>
                            </div>
                            <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Khazanah files</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                    <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <CarbonDocumentPdf/>
                                            <span class="ml-2 w-0 flex-1 truncate cursor-pointer">resume_back_end_developer.pdf</span>
                                        </div>
                                        
                                        </li>
                                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <CarbonDocumentPdf/>
                                            <span class="ml-2 w-0 flex-1 truncate cursor-pointer">resume_back_end_developer.pdf</span>
                                        </div>
                                        
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
