<script setup lang="ts">
import Layout from '@/layouts/societies/Layout.vue';
import { Society, University } from '@/types';
import { Head } from '@inertiajs/vue3';

interface Props {
    university: University;
    society: Society;
    can: object;
}

defineProps<Props>();
</script>

<template>
    <Head :title="society.name" />

    <Layout :university="university" :society="society" :can="can"> </Layout>
</template>

<style scoped></style>
