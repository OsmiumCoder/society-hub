import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export enum SocietyMemberRole {
    Member = 1,
    Admin = 2,
    Owner = 3,
}
