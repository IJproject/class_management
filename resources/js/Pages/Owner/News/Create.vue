<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'


const props = defineProps({
    target: Object,
})

const selected = ref(props.target[0]);

const form = useForm({
    title: '',
    content: '',
    target: 0,
})

const submit = () => {
    form.target = selected
    form.post(route('owner.news.store'), {
    });
}

</script>

<template>
    <Head title="お知らせ" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">お知らせ作成</h2>
        </template>
        <div>
            <form @submit.prevent="submit">
                <Listbox as="div" v-model="selected">
                    <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">送信対象</ListboxLabel>
                    <div class="relative mt-2">
                    <ListboxButton class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <span class="block truncate">{{ selected.person }}</span>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                        </span>
                    </ListboxButton>

                    <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                        <ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <ListboxOption as="template" v-for="item in props.target" :key="item.id" :value="item" v-slot="{ active, selected }">
                            <li :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                            <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{ item.person }}</span>

                            <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                            </span>
                            </li>
                        </ListboxOption>
                        </ListboxOptions>
                    </transition>
                    </div>
                </Listbox>
                <div>
                    <label for="title" class="block">タイトル</label>
                    <input type="text" id="title" v-model="form.title" class="w-full rounded-md border-gray-300">
                </div>
                <div>
                    <label class="block">本文</label>
                    <textarea v-model="form.content" class="w-full rounded-md border-gray-300"></textarea>
                </div>
                <button type="submit" class="mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">作成</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>