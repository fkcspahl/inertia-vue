<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { route } from 'ziggy-js';

/**
 * Props
 */

defineProps<{ routeName: string }>();
</script>

<template>
    <Link :href="route(routeName)" :class="{ 'font-bold': route().current() == routeName }">
        <slot />
    </Link>
</template>