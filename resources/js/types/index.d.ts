import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';
import { SocietyMemberRole } from '@/lib/utils';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface Flash {
    success: string;
    error: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
    can: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
    flash: Flash;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    is_admin: boolean;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export interface Pagination<T> {
    current_page: number;
    data: Array<T>;
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: Array<PaginationLink>;
    next_page_url: string;
    path: string;
    per_page: number;
    prev_page_url: string;
    to: number;
    total: number;
}

export interface PaginationLink {
    url: string;
    label: string;
    active: boolean;
}

export interface Can {
    create: boolean;
    update: boolean;
    delete: boolean;
}

export interface University {
    id: string;
    name: string;
    description: string;
    address: string;
    city: string;
    state: string;
    country: string;
    postal_code: string;
    phone: string;
    email: string;
    website: string;
    is_active: boolean;
    is_featured: boolean;
}
export interface Society {
    id: string;
    university_id: string;
    name: string;
    description: string;
    email: string;
    facebook_url: string;
    instagram_handle: string;
    twitter_handle: string;
    discord_url: string;
    meeting_schedule: string;
    meeting_location: string;
    founding_date: Date;
    is_active: boolean;
    is_official: boolean;
    category: string;
    tags: Array;
}

export interface SocietyMember extends User {
    pivot: SocietyMemberPivot;
}

export interface SocietyMemberPivot {
    society_id: string;
    user_id: number;
    role: SocietyMemberRole,
    title: string;
    renewed_at: string;
    is_expired: boolean;
}
