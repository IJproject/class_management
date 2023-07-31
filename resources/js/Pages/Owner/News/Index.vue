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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">お知らせ</h2>
        </template>
        <div>
            <div class="flex justify-end">
                <Link :href="route('owner.news.create')" class="block bg-gray-500 p-2 text-white">お知らせの新規作成</Link>
            </div>
            <div>
                <h3>公開中</h3>
                <div>
                    
                    <div v-for="(item, index) in news" :key="index" class="bg-white shadow-md">
                        <Link :href="route('owner.news.show',item.id)" class="block my-4 p-4">
                            <div class="flex justify-between">
                                <h3>{{ item.title }}</h3>
                                <p v-if="item.target.id == 1" class="text-red-600">{{ item.target.person }}</p>
                                <p v-if="item.target.id == 2" class="text-blue-600">{{ item.target.person }}</p>
                                <p v-if="item.target.id == 3" class="text-green-600">{{ item.target.person }}</p>
                            </div>
                            <p>{{ item.content }}</p>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>