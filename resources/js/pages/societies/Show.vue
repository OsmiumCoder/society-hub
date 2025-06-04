<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { BreadcrumbItem, type NavItem, Society, University } from '@/types';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
} from '@/components/ui/navigation-menu';

interface Props {
    university: University;
    society: Society;
    can: object;
}

const props = defineProps<Props>();

const navItems: NavItem[] = [
    {
        title: 'Home',
        href: route('universities.societies.show', {university: props.university.id, society: props.society.id}),
        isActive: route().current('universities.societies.show', {university: props.university.id, society: props.society.id})
    },
    {
        title: 'About',
        href: '',
        isActive: false
    },
    {
        title: 'Events',
        href: '',
        isActive: false
    },
    {
        title: 'Store',
        href: '',
        isActive: false
    },
    {
        title: 'Members',
        href: '',
        isActive: false,
        can: false
    },
    {
        title: 'Settings',
        href: '',
        isActive: false,
        can: false
    },
];

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
    <Head :title="society.name" />

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

            <div class="flex justify-center">
                <NavigationMenu>
                    <NavigationMenuList>
                        <NavigationMenuItem v-for="(item, index) in navItems" :key="index" class="relative flex h-full items-center">
                            <Link :href="item.href">
                                <NavigationMenuLink>
                                    {{ item.title }}
                                </NavigationMenuLink>
                            </Link>
                            <div
                                v-if="item.isActive"
                                class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-black dark:bg-white"
                            ></div>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>
            </div>

            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
