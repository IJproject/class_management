<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="振替申請" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">振替申請</h2>
        </template>
        <div>
            <div>
                <Link :href="route('owner.transfer.create')" class=" py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">振替する</Link>    
            </div> 
        </div>
    </AuthenticatedLayout>
</template>