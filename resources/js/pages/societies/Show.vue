<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { BreadcrumbItem, Society, University } from '@/types';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';

interface Props {
    university: University;
    society: Society;
    can: object;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Universities',
        href: route('universities.index'),
    },
    {
        title: props.university.name,
        href: route('universities.show', {university: props.university.id}),
    },
    {
        title: 'Societies',
        href: route('universities.societies.index', {university: props.university.id}),
    },
    {
        title: props.society.name,
        href: route('universities.societies.show', {university: props.university.id, society: props.society.id}),
    },
];
</script>

<template>
    <Head :title="university.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="h-[20vh] relative overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <img src="https://placehold.co/1300x200"
                     :alt="society.name"
                     class="absolute inset-0 w-full h-full object-cover rounded-xl"
                     width="1300"
                     height="200" />

                <div class="absolute inset-0 bg-black opacity-80"></div>

                <div class="relative h-full flex flex-col items-center justify-center text-center p-4 text-white">
                    <h1 class="text-4xl font-bold mb-4">{{ society.name }}</h1>
                    <p class="text-xl max-w-2xl">{{ society.category }}</p>
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
