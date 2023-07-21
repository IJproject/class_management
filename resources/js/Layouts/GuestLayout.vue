<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { HomeIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
        <Link :href="route('home')" class="hidden sm:block mt-8 py-3 px-6 rounded-xl bg-gray-500 text-white">ホームに戻る</Link>
        <Link :href="route('home')" class="block sm:hidden absolute bottom-5 right-5 bg-gray-500 text-white p-3 rounded-full">
            <HomeIcon class="h-8 w-8"/>
        </Link>
        
    </div>
</template>
