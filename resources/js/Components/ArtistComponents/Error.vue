<script setup>
import { defineProps, ref, onMounted } from 'vue';
import CarbonInformationFilled from '~icons/carbon/information-filled'

const props = defineProps ({
	message: String,
})

const showNotification = ref (false);

onMounted (() => {
	showNotification.value = true;
	setTimeout (() => {
		showNotification.value = false;
	}, 3000);
});

</script>

<template>
    <div>
        <div class='flex items-center overflow-hidden border-red-500 border-l-4 transition-opacity shadow-md duration-100 ease-linear' v-if="message && showNotification">
            <div class="inline-flex bg-red-200/30 border-red-100 border backdrop-blur-sm min-w-[16rem] h-14 p-3">
                <CarbonInformationFilled class="flex items-center text-red-500 mr-2" />
                <h1 class="text-left text-sm text-neutral-800 antialiased">{{ message }}</h1>
            </div>
        </div>
    </div>
</template>