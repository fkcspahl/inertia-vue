<script lang="ts" setup>
import NavLink from '@/components/NavLink.vue';
import { Head, usePage } from '@inertiajs/vue3';

/**
 * Props
 */

 defineProps<{ title: string }>();

/**
 * Data
 */

const page = usePage();
</script>

<template>

    <Head :title="title" />
    <header>
        <nav class="bg-slate-500 text-white p-2">
            <ul class="flex space-x-4">
                <li>
                    <NavLink routeName="home">Home</NavLink>
                </li>
                <li>
                    <NavLink routeName="about">About</NavLink>
                </li>
            </ul>
        </nav>
    </header>
    <div class="p-3">
        <slot />

        <transition>
            <p class="fixed bottom-0 inset-x-0 mx-auto bg-green-500 p-2 border-green-700 text-white text-center"
                v-if="page.props.flash?.success">
                {{ page.props.flash?.success }}
            </p>
        </transition>
    </div>
    <footer>

    </footer>
</template>

<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>