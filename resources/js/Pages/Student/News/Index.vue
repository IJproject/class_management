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
            <div>
                <div> 
                    <div v-for="(item, index) in news" :key="index" class="bg-white shadow-md">
                        <Link :href="route('teacher.news.show',item.id)" class="block my-4 p-4">
                            <div class="flex justify-between">
                                <h3>{{ item.title }}</h3>
                                <p v-if="item.target.id == 1" class="text-red-600">{{ item.target.person }}</p>
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