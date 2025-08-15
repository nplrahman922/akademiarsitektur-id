<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3'; // <-- 1. Tambahkan 'usePage'
import { BookOpen, Folder, LayoutGrid, Users, FileText } from 'lucide-vue-next'; // <-- 2. Tambahkan ikon baru
import AppLogo from './AppLogo.vue';

// Mengambil data user dari Inertia
const page = usePage();
const isAdmin = page.props.auth.user.is_admin;

// Navigasi Utama (TIDAK DIUBAH)
const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
];

// =======================================================
// KODE BARU: Array khusus untuk navigasi admin
// =======================================================
const adminNavItems: NavItem[] = [
    {
        title: 'Dashboard', // Anda bisa ganti jadi 'Admin Dashboard' jika mau
        href: '/admin/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Manajemen Pengguna',
        href: '/admin/users',
        icon: Users,
    },
    {
        title: 'Manajemen Konten',
        href: '/admin/content',
        icon: FileText,
    },
];
// =======================================================


// Navigasi Footer (TIDAK DIUBAH)
const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />

            <div v-if="isAdmin" class="mt-4 pt-4 border-t">
                <h2 class="px-4 text-xs text-gray-500 uppercase">
                    Admin
                </h2>
                <NavMain :items="adminNavItems" class="mt-2" />
            </div>
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
