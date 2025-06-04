<script setup lang="ts">
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                    <Link :href="route('universities.index')">
                        <Card class="h-full">
                            <CardHeader>
                                <CardTitle>Explore Universities</CardTitle>
                                <CardDescription>Find your university today</CardDescription>
                            </CardHeader>
                            <CardContent> Explore the large catalog of universities and find your people! </CardContent>
                            <CardFooter>
                                <span class="font-semibold">Find your university today <span aria-hidden="true">→</span></span>
                            </CardFooter>
                        </Card>
                    </Link>
                </div>
                <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                    <PlaceholderPattern />
                    Upcoming Events
                    <!-- TODO: calendar popup or something? -->
                </div>
                <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                    <PlaceholderPattern />
                    My Societies
                    <!-- TODO: societies index, current uni -->
                </div>
            </div>
            <div class="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
                <PlaceholderPattern />
                Feed
            </div>
        </div>
    </AppLayout>
</template>
