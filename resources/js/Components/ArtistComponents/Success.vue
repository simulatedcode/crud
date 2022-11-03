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
        <div class='flex items-center overflow-hidden border-green-500 border-l-4 transition-opacity shadow-md duration-100 ease-linear' v-if="message && showNotification">
            <div class="inline-flex bg-green-200/30 border-green-100 border backdrop-blur-sm min-w-[16rem] h-14 p-3">
                <CarbonCheckmarkFilled class="flex items-center text-green-500 mr-2" />
                <h1 class="text-left text-sm text-neutral-800 antialiased">{{ message }}</h1>
            </div>
        </div>
    </div>
</template>