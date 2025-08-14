<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
// 'Head' dan 'PlaceholderPattern' dihapus karena tidak digunakan
// 'breadcrumbs' dihapus karena tidak digunakan

</script>

<template>
    <AppLayout title="Admin Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard Admin
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">Selamat Datang, Admin!</div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
