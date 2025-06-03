<script setup lang="ts">
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, Pagination, University } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

interface Props {
    universities: Pagination<University>;
    can: object;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
    {
        title: 'Universities',
        href: route('universities.index'),
    },
];
</script>

<template>
    <Head title="Universities" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    v-for="university in universities.data"
                    :key="university.id"
                    class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-auto overflow-hidden rounded-xl border"
                >
                    <Link :href="route('universities.show', { university: university.id })">
                        <div class="relative overflow-hidden">
                            <div class="">
                                <img src="https://placehold.co/600x400" :alt="university.name" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-white/10" width="2432" height="1442" />
                                <div class="relative" aria-hidden="true">
                                    <div class="absolute -inset-x-20 bottom-0 bg-linear-to-t from-white pt-[20%]" />
                                </div>
                            </div>
                        </div>
                        <Card class="h-full border-t-0 rounded-t-none">
                            <CardHeader>
                                <CardTitle>{{ university.name }}</CardTitle>
                                <CardDescription>{{ university.city }}, {{ university.state }}, {{ university.country }}</CardDescription>
                            </CardHeader>
                            <CardContent>{{ university.description }}</CardContent>
                            <CardFooter>
                                <span class="font-semibold">Explore {{ university.name }} <span aria-hidden="true">→</span></span>
                            </CardFooter>
                        </Card>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
