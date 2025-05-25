<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img :class="[className, 'rounded-md']" src="/logo.png" alt="Society Hub" v-bind="$attrs" />
</template>
