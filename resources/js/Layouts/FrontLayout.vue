<script setup>
import ApplicationLogo from '@/Components/AdminPanel/ApplicationLogo.vue';
import CarbonSearch from '~icons/carbon/search';
import CarbonMenu from '~icons/carbon/menu'
import DarkSwitcher from '@/Components/DarkSwitcher.vue';

</script>

<template>
    <main class="max-w-screen-2xl mx-auto w-full py-4 bg-white/70 sticky top-0 backdrop-blur-lg backdrop-brightness-110 lg:py-6 dark:bg-neutral-900">
        <!-- Navigator -->
        <section class="max-w-7xl mx-auto">
            <div class=" flex justify-center items-center">
                <div class="flex-1 justify-start items-center">
                    <ApplicationLogo class="h-11 w-24"/>
                </div>
                <nav class="flex justify-center ">
                    <ul class="relative hidden lg:flex space-x-7 leading-6">
                        <li class="text-gray-600 hover:text-indigo-800 cursor-pointer dark:text-zinc-300 dark:hover:text-indigo-400">Home</li>
                        <li class="text-gray-600 hover:text-indigo-800 cursor-pointer dark:text-zinc-300 dark:hover:text-indigo-400">About</li>
                        <li class="text-gray-600 hover:text-indigo-800 cursor-pointer dark:text-zinc-300 dark:hover:text-indigo-400">Archive</li>
                        <li class="text-gray-600 hover:text-indigo-800 cursor-pointer dark:text-zinc-300 dark:hover:text-indigo-400">Contact</li>
                        <li class="text-gray-600 hover:text-indigo-800 cursor-pointer dark:text-zinc-300 dark:hover:text-indigo-400">Library</li>
                    </ul>
                </nav>
                <div class="flex-1 flex justify-end items-center space-x-4">
                    <button class="ml-2 relative w-10 h-10 inline-flex items-center justify-center p-2 text-gray-700 lg:hidden"><CarbonMenu/></button>
                    <span class="inline-flex text-lg dark:text-white"><CarbonSearch/></span>
                    <span class="inline-flex text-xl"><DarkSwitcher/></span>
                </div>
            </div>
        </section>
    </main>
    
    <main>
        <slot></slot>
    </main>
</template>