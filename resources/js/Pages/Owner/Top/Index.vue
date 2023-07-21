<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    schedules: Object,
})

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
                            <th v-for="schedule in schedules" :key="schedule.id" scope="col" class="py-2 px-2 text-sm font-semibold text-gray-900 sm:pl-0">
                                {{ schedule.time.start }}〜{{ schedule.time.finish }}
                            </th>
                            <!-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Edit</span>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="lesson in lessons" :key="lesson.id" class="even:bg-gray-50">
                            <!-- <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ lesson.schedule.date }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.type.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.subject.name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ lesson.student.name }}</td> -->
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