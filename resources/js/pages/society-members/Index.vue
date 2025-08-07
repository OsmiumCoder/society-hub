<script setup lang="ts">
import Layout from '@/layouts/societies/Layout.vue';
import { SocietyMemberRole } from '@/lib/utils';
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
import { MoreHorizontal } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'


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
        <div v-if="can.create" class="mt-6 mr-6 flex justify-end">
            <Button type="button">
                Add Society Member
            </Button>
        </div>
        <div class="p-6">
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]"> Name </TableHead>
                        <TableHead>Email</TableHead>
                        <TableHead>Role</TableHead>
                        <TableHead>Title</TableHead>
                        <TableHead>Membership</TableHead>
                        <TableHead v-if="can.update">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="member in members.data"
                              :key="member.id">
                        <TableCell class="font-medium">
                            {{ member.name }}
                        </TableCell>
                        <TableCell>{{ member.email }}</TableCell>
                        <TableCell>{{ SocietyMemberRole[member.pivot.role] }}</TableCell>
                        <TableCell>{{ member.pivot.title }}</TableCell>
                        <TableCell>{{ member.pivot.is_expired ? 'Expired' : 'Active' }}</TableCell>
                        <TableCell v-if="can.update">
                            <DropdownMenu>
                                <DropdownMenuTrigger as-child>
                                    <Button variant="ghost" class="w-8 h-8 p-0">
                                        <span class="sr-only">Open menu</span>
                                        <MoreHorizontal class="w-4 h-4" />
                                    </Button>
                                </DropdownMenuTrigger>
                                <DropdownMenuContent align="end">
                                    <DropdownMenuLabel>Actions</DropdownMenuLabel>
                                    <DropdownMenuItem>Change Role</DropdownMenuItem>
                                    <DropdownMenuItem>Change Title</DropdownMenuItem>
                                    <DropdownMenuItem></DropdownMenuItem>
                                    <DropdownMenuSeparator />
                                    <DropdownMenuItem>Renew Membership</DropdownMenuItem>
                                    <DropdownMenuItem>Delete Society Member</DropdownMenuItem>
                                </DropdownMenuContent>
                            </DropdownMenu>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
            <Pagination :items-per-page="members.per_page" :total="members.total">
                <PaginationContent>
                    <Link :href="members.prev_page_url">
                        <PaginationPrevious class="cursor-pointer" :disabled="!members.prev_page_url" />
                    </Link>

                    <template v-for="(item, index) in members.links.slice(1, members.links.length - 1)" :key="index">
                        <Link :href="item.url">
                            <PaginationItem class="cursor-pointer" :value="index + 1" :is-active="item.active">
                                {{ item.label }}
                            </PaginationItem>
                        </Link>
                    </template>

                    <Link :href="members.next_page_url">
                        <PaginationNext class="cursor-pointer" :disabled="!members.next_page_url" />
                    </Link>
                </PaginationContent>
            </Pagination>
        </div>
    </Layout>
</template>
