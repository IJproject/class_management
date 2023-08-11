<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'


const props = defineProps({
    lesson: Object,
    times: Object,
    teachers: Object,
})

console.log(props.lesson.teacher);

const form = useForm({
    transferDate: props.lesson.schedule.date,
    transferTime: props.times[0],
    transferTeacher: props.lesson.teacher,
})

const submit = () => {
    form.put(route('owner.transfer.update', props.lesson.id), {
    });
}

</script>

<template>
    <Head title="振替申請" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">振替申請</h2>
        </template>
        <div>
            <div>
                <form @submit.prevent="submit">
                    <!-- モーダルに確認画面 -->
                    <div>
                        <h3>振替先の選択</h3>
                        <button type="submit" class="mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">振替</button>
                    </div>
                    <!-- 振替先 -->
                    <div>
                        <label>日付</label>
                        <input type="date" v-model="form.transferDate" class="block w-full">
                    </div>
                    <div>
                        <!-- 上と連携する必要なし -->
                        <label>時間</label>
                        <Listbox v-model="form.transferTime">
                            <div class="relative mt-1">
                                <ListboxButton class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                                    <span class="block truncate">{{ form.transferTime.start }}〜{{ form.transferTime.finish }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                        <ListboxOption v-slot="{ active, selected }" v-for="(time, index) in props.times" :key="index" :value="time" as="template">
                                            <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-10 pr-4', ]">
                                                <span :class="[ selected ? 'font-medium' : 'font-normal', 'block truncate',]">{{ time.start }}〜{{ time.finish }}</span>
                                                <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600">
                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                            </div>
                        </Listbox>
                    </div>
                    <div>
                        <!-- 上と連携する必要なし -->
                        <label>担当講師</label>
                        <Listbox v-model="form.transferTeacher">
                            <div class="relative mt-1">
                                <ListboxButton class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                                    <span class="block truncate">{{ form.transferTeacher.lastName }}{{ form.transferTeacher.firstName }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                        <ListboxOption v-slot="{ active, selected }" v-for="(teacher, index) in props.teachers" :key="index" :value="teacher" as="template">
                                            <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-10 pr-4', ]">
                                                <span :class="[ selected ? 'font-medium' : 'font-normal', 'block truncate',]">{{ teacher.lastName }}{{ teacher.firstName }}</span>
                                                <span v-if="selected" class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600">
                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                        </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                            </div>
                        </Listbox>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>