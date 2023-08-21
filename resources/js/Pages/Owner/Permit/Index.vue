<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const allNews = [
  { id: 1, created_at: '2023/10/1', title: 'お知らせ１', sender: '岩田岩子', recipient: '岩田コメお' },
  { id: 2, created_at: '2023/10/1', title: 'お知らせ２', sender: '岩田岩男', recipient: '岩田岩ヲ' },
  { id: 3, created_at: '2023/10/1', title: 'お知らせ３', sender: '岩田岩化', recipient: '岩田岩華' },
]
</script>

<template>
    <Head title="招待" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">招待</h2>
        </template>
        <div class="space-y-10 text-center">
            <div class="bg-white shadow-lg">
                <h2 class="mt-2 py-2 text-xl font-semibold">新しい講師の招待</h2>
                <p class="text-xs text-gray-500 mb-4">メールアドレスが必要です</p>
                <Link :href="route('owner.permit.show', 0)" class="inline-block mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">招待</Link>
            </div>
            <div class="bg-white shadow-lg">
                <h2 class="mt-2 py-2 text-xl font-semibold">新しい生徒の招待</h2>
                <p class="text-xs text-gray-500 mb-4">メールアドレスが必要です</p>
                <Link :href="route('owner.permit.show', 1)" class="inline-block mt-2 mb-4 mx-auto py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">招待</Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>