<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps ({
    artist: Object
})

const form = useForm({
    firstname: props.artist.firstname,
    lastname: props.artist.lastname,
    bod: props.artist.bod,
    dod: props.artist.dod,
    category: '',
    is_active: props.artist.is_active,
})

function updateArtist(){
    form.put(route('artists.update', props.artist.id),
    {
        preserveState: true,
        preserveScroll: true,
    });
}


</script>
<template>
    <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="updateArtist">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                      <!-- Form -->
                      <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm text-gray-700">First name<span class="text-xs text-red-500 ml-1">*</span></label>
                                <input v-model="form.firstname" type="text" name="first-name" id="first-name" class="mt-1 block w-full border-x-0 border-t-0 border-b-gray-400 bg-gray-100 sm:text-sm" placeholder="First name">
                                <div v-if="form.errors.firstname" class="text-red-600 text-xs mt-1">{{ form.errors.firstname }}</div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm text-gray-700">Last name<span class="text-xs text-red-500 ml-1">*</span></label>
                                <input v-model="form.lastname" type="text" name="last-name" id="last-name" class="mt-1 block w-full border-x-0 border-t-0 border-b-gray-400 bg-gray-100 sm:text-sm" placeholder="Last name">
                                <div v-if="form.errors.lastname" class="text-red-600 text-xs mt-1">{{ form.errors.lastname }}</div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm text-gray-700">Birth of date<span class="text-xs text-red-500 ml-1">*</span></label>
                                <input v-model="form.bod" type="date" class="mt-1 block w-full border-x-0 border-t-0 border-b-gray-400 bg-gray-100 sm:text-sm" placeholder="Last name">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm text-gray-700">Died of date<span class="text-xs text-red-500 ml-1">*</span></label>
                                <input v-model="form.dod" type="date" class="mt-1 block w-full border-x-0 border-t-0 border-b-gray-400 bg-gray-100 sm:text-sm" placeholder="Last name">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="status" class="w-full block text-sm text-gray-700">Category</label>
                                <select v-model="form.category" id="category" name="category" autocomplete="category" class="mt-1 block w-full border-x-0 border-t-0 border-b-gray-400 bg-gray-100 sm:text-sm">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm text-gray-700">Status<span class="text-xs text-red-500 ml-1">*</span></label>
                                <input v-model="form.is_active" type="checkbox" name="is_active" />
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="bg-blue-50 px-4 py-3 sm:px-6">
                        <button type="submit" :disabled="form.processing" class="inline-flex border border-transparent bg-blue-600 py-2 px-8 text-sm text-blue-100 font-medium hover:text-white hover:bg-blue-700 focus:outline-none">Save</button>
                    </div>
                </div>
        </form>
    </div>
</template>