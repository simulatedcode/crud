<script setup>
import CarbonBrightnessContrast from '~icons/carbon/brightness-contrast'
import { useDark, useToggle } from '@vueuse/core'

const isDark = useDark()
const toggleDark = useToggle(isDark)
</script>

<template>
  <button @click="toggleDark()">
    <CarbonBrightnessContrast class="text-xl items-center font-medium transition-transform rotate dark:text-neutral-50 dark:rotate-180 dark:transition-transform" />
  </button>
</template>
