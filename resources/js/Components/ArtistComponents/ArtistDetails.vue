<script setup>
import moment from 'moment';

const props = defineProps ({
    artists:Object
})

</script>

<template>
        <div v-if="artist" class="items-center mx-auto px-6">
            <span class="flex items-center font-medium">Name: 
                    <p class="ml-2 text-gray-700">{{ $page.props.artist.firstname }} {{ $page.props.artist.lastname }}</p>
            </span>
            <span class="mt-1 flex items-center text-gray-700 text-xs">Created:
                <p class="ml-2 text-xs"> {{ moment($page.props.artist.created_at).format('MMM, Do YYYY, h:mm a') }}</p>
            </span>
        </div>
</template>