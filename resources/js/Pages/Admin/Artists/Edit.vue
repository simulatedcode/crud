<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditForm from '../../../Components/ArtistComponents/EditForm.vue';

defineProps ([
    'artist'
])

</script>

<template>
    <AppLayout title="Artists">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Form
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                                <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                            </div>
                        </div>
                    
                        <EditForm :artist="artist"/>
                      
                    </div>
                    
                </div>
            </div>
        </div>
    </AppLayout>
</template>
