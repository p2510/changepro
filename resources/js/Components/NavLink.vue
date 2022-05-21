<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'flex items-center text-white rounded-md drop-shadow-md  p-1 bg-gray-600 text-sm font-medium leading-5 hover:bg-gray-800 focus:outline-none focus:bg-gray-700 transition  duration-300 ease-in-out'
    : 'flex items-center text-white rounded-md drop-shadow-md  p-1 bg-gray-400 text-sm font-medium leading-5 hover:bg-gray-600 focus:outline-none focus:bg-gray-700 transition  duration-300 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
