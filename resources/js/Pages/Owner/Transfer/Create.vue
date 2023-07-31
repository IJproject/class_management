<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'


const props = defineProps({
    schedules: Object,
    lessons: Object,
})

const selectedDate = ref('2023-07-10');
const selectedTime = ref(props.schedules[0])
const searchedLesson = ref([]);
const selectedClass = ref({});

const search = () => {
    searchedLesson.value = props.lessons.filter(lesson => lesson.schedule.date == selectedDate.value && lesson.schedule.time.start == selectedTime.value.time.start);
}

const submit = () => {
    form.post(route('owner.transfer.store'), {
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
                <!-- 振替元 -->
                <h3>振替する授業の検索</h3>
                <div>
                    <label>日付</label>
                    <input type="date" v-model="selectedDate" class="block w-full">
                </div>
                <div>
                    <!-- 上と連携する必要なし -->
                    <label>時間</label>
                    <Listbox v-model="selectedTime">
                        <div class="relative mt-1">
                            <ListboxButton class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                                <span class="block truncate">{{ selectedTime.time.start }}〜{{ selectedTime.time.finish }}</span>
                                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                </span>
                            </ListboxButton>

                            <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                <ListboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption v-slot="{ active, selected }" v-for="(schedule, index) in props.schedules" :key="index" :value="schedule" as="template">
                                        <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-10 pr-4', ]">
                                            <span :class="[ selected ? 'font-medium' : 'font-normal', 'block truncate',]">{{ schedule.time.start }}〜{{ schedule.time.finish }}</span>
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
                <button type="button" @click="search" class="mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">授業検索</button>
            </div>
            <div v-if="searchedLesson[0] != {}">
                <form @submit.prevent="submit">
                    <!-- モーダルに確認画面 -->
                    <!-- 振替先 -->
                    <h3>振替先を選択</h3>
                    <div>
                        <label>対象の授業選択</label>
                        <Listbox v-model="selectedClass">
                            <div class="relative mt-1">
                                <ListboxButton class="relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                                    <span class="block truncate">{{ selectedClass }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                        <ListboxOption v-slot="{ active, selected }" v-for="(lesson, index) in searchedLesson" :key="index" :value="lesson" as="template">
                                            <li :class="[ active ? 'bg-amber-100 text-amber-900' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-10 pr-4', ]">
                                                <span :class="[ selected ? 'font-medium' : 'font-normal', 'block truncate',]">
                                                    生徒名：{{ lesson.student.firstName }}{{ lesson.student.lastName }}&emsp;講師名：{{ lesson.teacher.firstName }}{{ lesson.teacher.lastName }}
                                                </span>
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
                    <button type="submit" class="mt-2 mb-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">申請</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>