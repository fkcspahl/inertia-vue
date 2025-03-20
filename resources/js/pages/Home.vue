<script lang="ts" setup>
import { ref } from 'vue';
import Button from '@/components/Button.vue';
import DefaultLayout from '@/layouts/DefaultLayout.vue';

/**
 * Data
 */

const count = ref(0);

/**
 * Functions
 */

const increment = () => {
    count.value++;
};

const decrement = () => {
    count.value--;
};
</script>

<template>
    <DefaultLayout title="Home">
        <div>
            <h1>Home Page</h1>
        </div>

        <div>
            <p>Count: {{ count }}</p>
            <div class="space-x-3">
                <Button @click="increment">Increment</Button>
                <Button @click="decrement">Decrement</Button>
            </div>
        </div>
    </DefaultLayout>
</template>