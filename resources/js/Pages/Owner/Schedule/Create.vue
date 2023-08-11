<script setup>
import { ref } from 'vue'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    times: Object,
    timegroups: Object,
})

const years = ["選択してください", 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029];
const months = ["選択してください", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

const selectedYear = ref(years[0]);
const selectedMonth = ref(months[0]);

const days = ["月", "火", "水", "木", "金", "土", "日"]
 
const scheduleForm = useForm({
    type: 1,
    fromDate: '',
    toDate: '',
    selectedYear: selectedYear,
    selectedMonth: selectedMonth,
    days: [],
    times: [],
});

const groups = ref([])
props.timegroups.forEach((group, index) => {
    if(index === 0) {
        groups.value.push([])
        groups.value[group.group - 1].push(group.time)
    } else if(group.group === props.timegroups[index-1].group) {
        groups.value[group.group - 1].push(group.time)
    } else {
        groups.value.push([])
        groups.value[group.group - 1].push(group.time)
    }
});
const selectedGroup = ref(1)

const submitSchedule = () => {
    scheduleForm.post(route('owner.schedule.store'));
}

const timeForm = useForm({
    type: 2,
    start: '',
    finish: '',
});

const submitTime = () => {
    timeForm.post(route('owner.schedule.store'));
}

const timeGroupForm = useForm({
    type: 3,
    times: [],
});

const isSelectedTime = ref([]) //クリックされた時間帯
const selectedTimeClass = ref([]) //選択されている時間帯(Boolean)
for(let i = 0; i < props.times.length + 1; i++) {
    selectedTimeClass.value.push(false)
}

const addSelectedTimes = (id) => {
    isSelectedTime.value = timeGroupForm.times.filter(time => time === id);
    if(isSelectedTime.value.length === 0) {
        timeGroupForm.times.push(id);
        selectedTimeClass.value[id] = true
    }
    else {
        timeGroupForm.times = timeGroupForm.times.filter(time => time !== id)
        selectedTimeClass.value[id] = false
    }
}

const submitTimeGroup = () => {
    timeGroupForm.post(route('owner.schedule.store'));
}

setInterval(() => {
    console.log(selectedGroup.value)
}, 1000);


</script>

<template>
    <Head title="日程登録" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">日程登録</h2>
        </template>
        <div>
            <!-- 授業スケジュールの作成 -->
            <div>
                <h2>授業可能日程の登録</h2>
                <form @submit.prevent="submitSchedule">  
                    <div>
                        <p>日付で設定</p>
                    </div> 
                    <div>
                        <p>期間で設定</p>
                        <div class="flex justify-center">
                            <div class="px-10 flex-1">
                                <label for="from">いつから</label>
                                <input id="from" type="date" v-model="scheduleForm.fromDate" class="col-span-1 w-full">
                            </div>
                            <div>〜</div>
                            <div class="px-10 flex-1">
                                <label for="to">いつまで</label>
                                <input id="to" type="date" v-model="scheduleForm.toDate" class="col-span-1 w-full">
                            </div>
                        </div>
                    </div>
                    <p>月と曜日で設定</p>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1 px-10">
                            <Listbox as="div" v-model="selectedYear">
                                <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">年</ListboxLabel>
                                <div class="relative mt-2">
                                <ListboxButton class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <span class="block truncate">{{ selectedYear }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption as="template" v-for="year in years" :key="year" :value="year" v-slot="{ active, selected }">
                                        <li :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-8 pr-4']">
                                        <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{ year }}</span>

                                        <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 left-0 flex items-center pl-1.5']">
                                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                        </span>
                                        </li>
                                    </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                                </div>
                            </Listbox>
                        </div>
                        <div class="col-span-1 px-10">
                            <Listbox as="div" v-model="selectedMonth">
                                <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">月</ListboxLabel>
                                <div class="relative mt-2">
                                <ListboxButton class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <span class="block truncate">{{ selectedMonth }}</span>
                                    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                    </span>
                                </ListboxButton>

                                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption as="template" v-for="month in months" :key="month" :value="month" v-slot="{ active, selected }">
                                        <li :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-8 pr-4']">
                                        <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{ month }}</span>

                                        <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 left-0 flex items-center pl-1.5']">
                                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                        </span>
                                        </li>
                                    </ListboxOption>
                                    </ListboxOptions>
                                </transition>
                                </div>
                            </Listbox>
                        </div>
                    </div> 
                    <div>
                        <fieldset>
                            <legend class="text-base leading-6 text-gray-900">曜日</legend>
                            <div class="mt-4 divide-y divide-gray-200 border-b border-t border-gray-200">
                                <div v-for="(day, index) in days" :key="index" class="flex items-start py-4">
                                    <div class="min-w-0 flex-1 text-sm leading-6 text-center">
                                        <label :for="`day-${index}`" class="select-none font-medium text-gray-900">{{ day }}</label>
                                    </div>
                                    <div class="ml-3 flex h-6 items-center">
                                        <input :id="`day-${index}`" :name="`day-${index}`" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <RadioGroup v-model="selectedGroup">
                            <RadioGroupLabel class="sr-only">Privacy setting</RadioGroupLabel>
                            <div class="-space-y-px rounded-md bg-white">
                            <RadioGroupOption as="template" v-for="(group, index) in groups" :key="index" :value="index+1" v-slot="{ checked, active }">
                                <div :class="[index === 0 ? 'rounded-tl-md rounded-tr-md' : '', index === groups.length - 1 ? 'rounded-bl-md rounded-br-md' : '', checked ? 'z-10 border-indigo-200 bg-indigo-50' : 'border-gray-200', 'relative flex cursor-pointer border p-4 focus:outline-none']">
                                <span :class="[checked ? 'bg-indigo-600 border-transparent' : 'bg-white border-gray-300', active ? 'ring-2 ring-offset-2 ring-indigo-600' : '', 'mt-0.5 h-4 w-4 shrink-0 cursor-pointer rounded-full border flex items-center justify-center']" aria-hidden="true">
                                    <span class="rounded-full bg-white w-1.5 h-1.5" />
                                </span>
                                <span v-for="(time, idx) in group" :key="idx" class="ml-3 flex flex-col">
                                    <RadioGroupDescription as="span" :class="[checked ? 'text-indigo-700' : 'text-gray-500', 'block text-sm']">{{ time.start }}~{{ time.finish }}</RadioGroupDescription>
                                </span>
                                </div>
                            </RadioGroupOption>
                            </div>
                        </RadioGroup>
                    </div>
                    <button type="submit" class="mt-4 mb-8 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">登録</button>
                </form>
            </div>
            <!-- 授業時間の新規登録 -->
            <div>
                <h2>授業実施時間の登録</h2>
                <form @submit.prevent="submitTime">
                    <div>
                        <label for="start">開始時間</label>
                        <input type="time" name="start" id="start" required v-model="timeForm.start" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div>
                        <label for="finish">終了時間</label>
                        <input type="time" name="finish" id="finish" required v-model="timeForm.finish" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <button type="submit" class="mt-4 mb-8 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">登録</button>
                </form>
            </div>
            <!-- 一日のスケジュール新規登録 -->
            <div>
                <h2>タイムスケジュールの登録</h2>
                <form @submit.prevent="submitTimeGroup">
                    <div class="flex flex-wrap justify-center gap-x-2">
                        <div v-for="(time, index) in props.times" :key="index">
                            <div @click="addSelectedTimes(time.id)" :class="selectedTimeClass[time.id] ? 'p-4 rounded-lg bg-blue-500 text-white hover:bg-blue-400' : 'p-4 rounded-lg ring-2 ring-slate-300 hover:bg-slate-200'">{{ time.start }}~{{ time.finish }}</div>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 mb-8 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-400">登録</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>