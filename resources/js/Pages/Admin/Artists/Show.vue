<script setup>

const props = defineProps({
    artist: Array,
})

</script>

<template>
    <div class="p-6">
        <h1 class="text-xl">Artist Details</h1>
    </div>
    <div v-if="artist" class="flex mx-auto px-6">
       <span class="font-medium">Name: </span>
       <span class="ml-4 text-gray-700">{{ $page.props.artist.firstname }} {{ $page.props.artist.lastname }}</span>
    </div>
</template>