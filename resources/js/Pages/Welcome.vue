<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import FrontLayout from '@/Layouts/FrontLayout.vue';
import KaleidoskopSection from '@/Components/Front/KaleidoskopSection.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head title="Welcome" />

    <FrontLayout>
        <!-- Herosection -->
        <section  class="overflow-hidden transition-transform dark:bg-neutral-900 dark:text-neutral-50 dark:transition-transform">
            <div class="flex justify-center pt-48">
                <span class="hidden absolute background-image bg-radial-gradient opacity-[.15] pointer-events-none lg:inline-flex left-[-20%] -top-24 w-[640px] h-[640px]" />
                <div class="max-w-screen-xl px-5 mx-auto">
                    <div>
                        <h1 class="max-w-3xl mx-auto leading-8 text-4xl text-center dark:text-transparent dark:bg-clip-text dark:bg-gradient-to-r dark:from-lime-400 dark:to-teal-200 font-bold transition dark:transition md:text-6xl lg:text-7xl">
                            Digital Archive
                            <br class="hidden lg:inline">
                            <p>of Indonesian Contemporary Art</p>
                        </h1>
                        <p class="mt-6 max-w-xl mx-auto text-center text-md leading-relaxed md:mt-8 lg:mt-10">
                            Explore documents that record the dynamics of visual arts in Indonesia, related to artists or collective and their works, as well as art events.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
           <KaleidoskopSection />
        </section>

        

    </FrontLayout>
</template>
