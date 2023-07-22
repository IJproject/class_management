<script setup>
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    display: Object,
});

const form = useForm({
    role: props.display.role,
    email: '',
    lastName: '',
    firstName: '',
    phone: '',
})

const submit = () => {
    form.post(route('owner.permit.store'), {
    });
}

</script>

<template>
    <Head title="招待" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">招待</h2>
        </template>
        <div class="space-y-10 text-center">
            <div class="bg-white shadow-lg">
                <h2 class="mt-2 py-2 text-xl font-semibold">{{ props.display.registerTitle }} <span class="text-xs text-gray-600">*推奨</span></h2>
                <form @submit.prevent="submit" class="pt-2">
                    <div class="w-3/4 mx-auto px-12 border border-gray-200 rounded-lg shadow-md">
                        <div class="mb-2">
                            <label for="email" class="block my-2">メールアドレス <span class="text-xs text-red-600">*必須</span></label>
                            <input type="email" id="email" name="email" required v-model="form.email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-x-6">
                            <div class="cols-span-1">
                                <label for="lastName" class="block my-2">苗字 <span class="text-xs text-red-600">*必須</span></label>
                                <input type="text" id="lastName" name="lastName" required v-model="form.lastName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
                            </div>
                            <div class="cols-span-1">
                                <label for="firstName" class="block my-2">名前 <span class="text-xs text-red-600">*必須</span></label>
                                <input type="text" id="firstName" name="firstName" required v-model="form.firstName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>  
                        <div class="mb-6">
                            <label for="phone" class="block my-2">電話番号</label>
                            <input type="text" id="phone" name="phone" v-model="form.phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <button type="submit" class="mt-6 mb-8 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">登録</button>
                </form>
            </div>
            <div class="bg-white shadow-lg ">
                <h2 class="mt-2 py-2 text-xl font-semibold">{{ props.display.inviteTitle }}</h2>
                <form>
                    <div>
                        <label for="email" class="block">送信先のメールアドレス</label>
                        <input type="email" id="email" name="email">
                    </div>
                </form>
                <button type="button" class="mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">招待メール送信</button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>