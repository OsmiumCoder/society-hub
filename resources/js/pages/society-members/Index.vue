<script setup lang="ts">
import Layout from '@/layouts/societies/Layout.vue';
import { Can, Pagination as PaginationType, Society, SocietyMember, University } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import {
    Pagination,
    PaginationContent,
    PaginationItem,
    PaginationNext,
    PaginationPrevious,
} from '@/components/ui/pagination'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { SocietyMemberRole } from '@/lib/utils';

interface Props {
    university: University;
    society: Society;
    members: PaginationType<SocietyMember>;
    can: Can;
}

defineProps<Props>();

</script>

<template>
    <Head :title="society.name" />

    <Layout :university="university" :society="society" :can="can">
        <div class="p-6">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]">
                            Name
                        </TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead>Role</TableHead>
                        <TableHead>Title</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="member in members.data" :key="member.id">
                        <TableCell class="font-medium">
                            {{ member.name }}
                        </TableCell>
                        <TableCell>{{ member.email }}</TableCell>
                        <TableCell>{{ SocietyMemberRole[member.pivot.role] }}</TableCell>
                        <TableCell>{{ member.pivot.role }}</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
            <Pagination :items-per-page="members.per_page" :total="members.total">
                <PaginationContent>
                    <Link :href="members.prev_page_url">
                        <PaginationPrevious class="cursor-pointer" :disabled="!members.prev_page_url"/>
                    </Link>

                    <template v-for="(item, index) in members.links.slice(1, members.links.length-1)" :key="index">
                        <Link :href="item.url">
                            <PaginationItem class="cursor-pointer"
                                            :value="index + 1"
                                            :is-active="item.active"
                            >
                                {{ item.label }}
                            </PaginationItem>
                        </Link>
                    </template>

                    <Link :href="members.next_page_url">
                        <PaginationNext class="cursor-pointer" :disabled="!members.next_page_url"/>
                    </Link>

                </PaginationContent>
            </Pagination>
        </div>
    </Layout>
</template>
