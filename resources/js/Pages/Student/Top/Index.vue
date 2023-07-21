<script setup>
import AuthenticatedLayout from '@/Layouts/StudentAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    lessons: Object,
})

// const lessons = [
//   { id: 1, schedule: '2023/10/1 12:00~13:30', type: '講習', subject: '国語', teacher: '岩田岩子' },
//   { id: 2, schedule: '2023/10/1 14:00~15:30', type: '通常', subject: '数学', teacher: '岩田岩男' },
//   { id: 3, schedule: '2023/10/1 16:00~17:30', type: '講習', subject: '英語', teacher: '岩田岩化' },
// ]
</script>

<template>
    <Head title="授業一覧" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">授業一覧</h2>
        </template>
        <div>
            <div>
                <table class="min-w-full divide-y divide-gray-300 bg-white shadow-lg text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-0">日程</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">授業タイプ</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">科目</th>
                            <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900">担当講師</th>
                            <!-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="(lesson, index) in lessons" :key="index" class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ lesson.schedule.date }}<br>{{ lesson.schedule.time.start }}〜{{ lesson.schedule.time.finish }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.type.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.subject.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.teacher.name }}</td>
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