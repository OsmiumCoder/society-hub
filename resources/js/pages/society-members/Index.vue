<script setup lang="ts">
import Layout from '@/layouts/societies/Layout.vue';
import { Can, Pagination, Society, SocietyMember, University } from '@/types';
import { Head } from '@inertiajs/vue3';

interface Props {
    university: University;
    society: Society;
    members: Pagination<SocietyMember>
    can: Can;
}

defineProps<Props>();
</script>

<template>
    <Head :title="society.name" />

    <Layout :university="university" :society="society" :can="can">
        <pre>
            {{members}}
        </pre>
    </Layout>
</template>

