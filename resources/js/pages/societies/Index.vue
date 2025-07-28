<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem, Pagination, Society, University } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

interface Props {
    university: University;
    societies: Pagination<Society>;
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
        href: route('universities.show', { university: props.university.id }),
    },
    {
        title: 'Societies',
        href: route('universities.societies.index', { university: props.university.id }),
    },
];
</script>

<template>
    <Head :title="university.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="my-2 flex justify-end">
                <Button type="button">
                    <Link :href="route('universities.societies.create', { university: props.university.id })"> Create a New Society </Link>
                </Button>
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    v-for="society in societies.data"
                    :key="society.id"
                    class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-auto overflow-hidden rounded-xl border"
                >
                    <Link :href="route('universities.societies.show', { university: university.id, society: society.id })">
                        <div class="relative overflow-hidden">
                            <div>
                                <img
                                    src="https://placehold.co/600x400"
                                    :alt="society.name"
                                    class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-white/10"
                                    width="2432"
                                    height="1442"
                                />
                                <div class="relative" aria-hidden="true">
                                    <div class="absolute -inset-x-20 bottom-0 bg-linear-to-t from-white pt-[20%]" />
                                </div>
                            </div>
                        </div>
                        <Card class="h-full rounded-t-none border-t-0">
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

<style scoped></style>
