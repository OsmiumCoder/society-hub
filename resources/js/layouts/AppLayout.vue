<script setup lang="ts">
import AppLayout from '@/layouts/app/AppHeaderLayout.vue';
import type { BreadcrumbItemType, SharedData } from '@/types';
import { Toaster } from '@/components/ui/sonner'
import 'vue-sonner/style.css'
import { computed, watch } from 'vue';
import { toast } from 'vue-sonner'
import { usePage } from '@inertiajs/vue3';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage<SharedData>();
const flash = computed(() => page.props.flash);

watch(flash, () => {
    if (flash.value.success) {
        console.log('here');
        toast('Action Successful', {
            description: flash.value.success,
        })
    }

    if (flash.value.error) {
        toast('An Error Occurred', {
            description: flash.value.error,
        })
    }
})
</script>

<template>
    <Toaster />
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>
