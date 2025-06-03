<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { BreadcrumbItem, Pagination, Society, University } from '@/types';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';

interface Props {
    university: University;
    societies: Pagination<Society>
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
];
</script>

<template>
    <Head :title="university.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    v-for="society in societies.data"
                    :key="society.id"
                    class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-auto overflow-hidden rounded-xl border"
                >
                    <Link :href="route('universities.societies.show', { university: university.id, society: society.id })">
                        <div class="relative overflow-hidden">
                            <div class="">
                                <img src="https://placehold.co/600x400" :alt="society.name" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-white/10" width="2432" height="1442" />
                                <div class="relative" aria-hidden="true">
                                    <div class="absolute -inset-x-20 bottom-0 bg-linear-to-t from-white pt-[20%]" />
                                </div>
                            </div>
                        </div>
                        <Card class="h-full border-t-0 rounded-t-none">
                            <CardHeader>
                                <CardTitle>{{ society.name }}</CardTitle>
                                <CardDescription>{{ society.category }}</CardDescription>
                            </CardHeader>
                            <CardContent>{{ society.description }}</CardContent>
                            <CardFooter>
                                <span class="font-semibold">Explore {{ society.name }} <span aria-hidden="true">→</span></span>
                            </CardFooter>
                        </Card>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
