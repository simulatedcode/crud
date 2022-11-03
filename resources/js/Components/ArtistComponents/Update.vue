<script setup>
import { defineProps, ref, onMounted } from 'vue';
import CarbonCheckmarkFilled from '~icons/carbon/checkmark-filled';

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
        <div class='flex items-center overflow-hidden border-blue-600 border-l-4 transition-opacity shadow-md duration-100 ease-linear' v-if="message && showNotification">
            <div class="inline-flex bg-blue-200/20 border-blue-100 border backdrop-blur-sm min-w-[16rem] h-14 p-3">
                <CarbonCheckmarkFilled class="flex items-center text-blue-600 mr-2" />
                <h1 class="text-left text-sm text-neutral-800 antialiased">{{ message }}</h1>
            </div>
        </div>
    </div>
</template>