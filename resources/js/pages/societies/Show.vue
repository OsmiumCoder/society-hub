<script setup lang="ts">
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { NavigationMenu, NavigationMenuItem, NavigationMenuLink, NavigationMenuList } from '@/components/ui/navigation-menu';
import AppLayout from '@/layouts/AppLayout.vue';
import { BreadcrumbItem, type NavItem, Society, University } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

interface Props {
    university: University;
    society: Society;
    can: object;
}

const props = defineProps<Props>();

const navItems: NavItem[] = [
    {
        title: 'Home',
        href: route('universities.societies.show', { university: props.university.id, society: props.society.id }),
        isActive: route().current('universities.societies.show', { university: props.university.id, society: props.society.id }),
        can: true,
    },
    {
        title: 'About',
        href: '',
        isActive: false,
        can: true,
    },
    {
        title: 'Events',
        href: '',
        isActive: false,
        can: true,
    },
    {
        title: 'Store',
        href: '',
        isActive: false,
        can: true,
    },
    {
        title: 'Members',
        href: '',
        isActive: false,
        can: false,
    },
    {
        title: 'Settings',
        href: '',
        isActive: false,
        can: false,
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
        href: route('universities.show', { university: props.university.id }),
    },
    {
        title: 'Societies',
        href: route('universities.societies.index', { university: props.university.id }),
    },
    {
        title: props.society.name,
        href: route('universities.societies.show', { university: props.university.id, society: props.society.id }),
    },
];
</script>

<template>
    <Head :title="society.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="border-sidebar-border/70 dark:border-sidebar-border relative h-[20vh] overflow-hidden rounded-xl border">
                <img
                    src="https://placehold.co/1300x200"
                    :alt="society.name"
                    class="absolute inset-0 h-full w-full rounded-xl object-cover"
                    width="1300"
                    height="200"
                />

                <div class="absolute inset-0 bg-black opacity-80"></div>

                <div class="relative flex h-full flex-col items-center justify-center p-4 text-center text-white">
                    <h1 class="mb-4 text-4xl font-bold">{{ society.name }}</h1>
                    <p class="max-w-2xl text-xl">{{ society.category }}</p>
                </div>
            </div>

            <div class="flex justify-center">
                <NavigationMenu>
                    <NavigationMenuList>
                        <template v-for="(item, index) in navItems">
                            <NavigationMenuItem v-if="item.can" :key="index" class="relative flex h-full items-center">
                                <Link :href="item.href">
                                    <NavigationMenuLink>
                                        {{ item.title }}
                                    </NavigationMenuLink>
                                </Link>
                                <div v-if="item.isActive" class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-black dark:bg-white"></div>
                            </NavigationMenuItem>
                        </template>
                    </NavigationMenuList>
                </NavigationMenu>
            </div>

            <div class="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
