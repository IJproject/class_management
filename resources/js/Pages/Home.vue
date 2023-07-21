<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="container mx-auto mt-12 space-y-6 text-center">
        <Link :href="route('owner.login')" class="block p-3 text-lg font-semibold rounded-md text-white bg-red-400">管理者はこちら</Link>
        <Link :href="route('teacher.login')" class="block p-3 text-lg font-semibold rounded-md text-white bg-cyan-500">講師はこちら</Link>
        <Link :href="route('student.login')" class="block p-3 text-lg font-semibold rounded-md text-white bg-green-500">生徒はこちら</Link>
    </div>
</template>