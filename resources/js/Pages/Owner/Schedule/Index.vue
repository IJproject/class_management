<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

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
            <div class="flex justify-end">
                <Link :href="route('owner.schedule.create')" class="bg-gray-500 p-2 text-white">各種登録はこちら</Link>
            </div>
            <div>
                <div>
                    <p>月刊日程表的なものを載せる</p>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>