<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    news: Object,
})

</script>

<template>
    <Head title="お知らせ" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">お知らせ詳細</h2>
        </template>
        <div>
            <div class="bg-white shadow-md p-4">
                <div class="flex justify-between">
                    <h3>{{ props.news.title }}</h3>
                    <p v-if="props.news.target.id == 1" class="text-red-600">{{ props.news.target.person }}</p>
                    <p v-if="props.news.target.id == 2" class="text-blue-600">{{ props.news.target.person }}</p>
                    <p v-if="props.news.target.id == 3" class="text-green-600">{{ props.news.target.person }}</p>
                </div>
                <p>{{ props.news.content }}</p>
                <div class="flex justify-end">
                    <Link :href="route('owner.news.edit', props.news.id)" class="block mx-2 p-2 bg-gray-500 text-white">編集</Link>
                    <Link :href="route('owner.news.destroy', props.news.id)" class="block mx-2 p-2 bg-gray-500 text-white">削除</Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>