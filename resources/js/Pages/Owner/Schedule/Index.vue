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
    <Head title="スケジュール管理" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">スケジュール管理</h2>
        </template>
        <div>
            <div>
                <table class="min-w-full divide-y divide-gray-300 bg-white shadow-lg text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-0">登録日</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">タイトル</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">発信者</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">対象者</th>
                            <!-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="news in allNews" :key="news.id" class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ news.created_at }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ news.title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ news.sender }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ news.recipient }}</td>
                            <!-- <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                    >Edit<span class="sr-only">, {{ lesson.id }}</span></a
                                >
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>