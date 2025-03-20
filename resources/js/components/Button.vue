<script lang="ts" setup>
import { useAttrs } from 'vue';

const attrs = useAttrs();
</script>

<template>
    <button class="bg-slate-500 text-white p-1 px-2 rounded hover:bg-slate-400 transition-colors" v-bind="attrs">
        <slot />
    </button>
</template>