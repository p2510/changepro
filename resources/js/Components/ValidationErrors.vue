<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <div v-if="hasErrors">
                <div class="bg-red-50 border-l-8 border-red-900 my-2">
                    <div class="flex items-center">
                        <div class="p-2">
                            <div class="flex items-center">
                        
                                <p class="px-6 py-4 text-red-900 font-semibold text-lg">Oups, quelque chose n'a pas fonctionné</p>
                            </div>
                            <ul class="px-16 mb-4">
                                 <li class="text-md font-bold text-red-500 text-sm" v-for="(error, key) in errors" :key="key">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

    </div>
</template>
