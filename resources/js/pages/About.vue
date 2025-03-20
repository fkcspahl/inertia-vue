<script lang="ts" setup>
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import { User } from '@/types';
import { ref, reactive } from 'vue';
import type { Ref } from 'vue';
import { router } from '@inertiajs/vue3';

const { user } = defineProps<{ user: User }>();

/**
 * Data
 */

const feelingGood: Ref<boolean> = ref(false);

const form = reactive({
    name: '',
    email: '',
});

// Werte aus dem user-Objekt in das Formular übernehmen (kommen aus der Datenbank)
form.name = user.name;
form.email = user.email;

/**
 * Functions
 */

const handleSubmit = () => {
    router.post(route('about.update'), form);
};
</script>

<template>
    <DefaultLayout title="Über mich">
        <div class="mb-3">

            <h1>About Page</h1>
            <p>Benutzername: {{ user.name }}</p>
            <p>E-Mail: {{ user.email }}</p>

            <div class="mt-5 border p-3 rounded shadow-sm inline-block">
                <form action="" method="POST" @submit.prevent="handleSubmit">
                    <div class="space-x-1 mb-2">
                        <label for="name">Name:</label>
                        <input class="border rounded-sm p-1" type="text" name="name" id="name" v-model="form.name">
                    </div>

                    <div class="mb-3 space-x-1">
                        <label for="email">E-Mail:</label>
                        <input class="border rounded-sm p-1" type="email" name="email" id="email" v-model="form.email">
                    </div>
                    <button type="submit"
                        class="bg-slate-500 text-white p-1 px-2 rounded hover:bg-slate-400 transition-colors">Absenden</button>
                </form>
            </div>

        </div>

        <div>
            <label class="space-x-3 cursor-pointer">
                <span>Gute Laune?</span>
                <input type="checkbox" name="" id="" v-model="feelingGood">
            </label>
        </div>
        <transition>
            <p v-if="feelingGood" class="mt-5 font-bold">Super!!! 😀</p>
        </transition>

    </DefaultLayout>
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