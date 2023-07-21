<script setup>
import AuthenticatedLayout from '@/Layouts/TeacherAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const applys = [
  { id: 1, title: "タイトル１", content:"夏季合宿で苦手を克服！！" },
  { id: 2, title: "タイトル２", content:"秋期合宿で苦手を克服！！" },
  { id: 3, title: "タイトル３", content:"冬期合宿で苦手を克服！！" },
]
</script>

<template>
    <Head title="シフト申請" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">シフト申請</h2>
        </template>
        <div class="space-y-6">
            <div v-for="apply in applys" :key="apply.id" class="bg-white shadow-lg px-4 py-2">
                <div class="my-6 text-lg font-bold text-center">{{ apply.title }}</div>
                <div class="mt-4 mb-12 text-center">{{ apply.content }}</div>
                <div class="flex justify-center space-x-6 pr-4 my-4">
                    <button class="block p-2 text-white bg-green-500 font-semibold rounded-lg">申し込む</button>
                    <button class="block p-2 text-white bg-red-500 font-semibold rounded-lg">保留</button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>