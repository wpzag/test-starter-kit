<script setup lang="ts">
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: '/users',
    },
];

defineProps<{
    name?: string;
    users: Record<string, string>[];
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mr-4 mt-4 flex justify-end">
            <Link :href="route('users.random')" method="post">
                <Button> Add Random User</Button>
            </Link>
        </div>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    v-for="user in users"
                    :key="user.id"
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <div class="grid h-full place-items-center">
                        <div class="flex flex-col items-center justify-between space-y-3">
                            <p>{{ user.name }}</p>
                            <p class="text-sm text-neutral-400">{{ user.email }}</p>
                        </div>
                    </div>
                    <PlaceholderPattern />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
