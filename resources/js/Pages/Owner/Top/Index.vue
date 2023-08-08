<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/OwnerAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    lessons: Object,
    times: Object,
})

// 時間・講師ごとに分類
const firstCategorizedLessons = ref([]);
const secondCategorizedLessons = ref([]);
const finalCategorizedLessons = ref([]);
const times = ref([])

for(let count = 0 ; count <= props.times.length ; count++) {
    firstCategorizedLessons.value.push([]);
}

props.lessons.forEach((lesson) => {
    const timeId = lesson.schedule.time.id;
    firstCategorizedLessons.value[timeId].push(lesson);
});

secondCategorizedLessons.value = firstCategorizedLessons.value.filter(subArray => subArray.length > 0); //空きを詰める
secondCategorizedLessons.value.forEach((lessons, timeIndex) => { 
    finalCategorizedLessons.value.push([])
    times.value.push(lessons[0].schedule.time)
    lessons.sort((a, b) => a.teacher_id - b.teacher_id)
    lessons.forEach((lesson, index) => {
        if(index === 0 || lessons[index-1].teacher_id !== lesson.teacher_id){
            finalCategorizedLessons.value[timeIndex].push({
                teacher: lesson.teacher,
                student1: lesson.student,
                subject1: lesson.subject,
                student2: {},
                subject2: {},
            })
        }
        else if(lessons[index-1].teacher_id === lesson.teacher_id) {
            finalCategorizedLessons.value[timeIndex][finalCategorizedLessons.value[timeIndex].length - 1].student2 = lesson.student
            finalCategorizedLessons.value[timeIndex][finalCategorizedLessons.value[timeIndex].length - 1].subject2 = lesson.subject
        }
        else {
            console.error('分類できませんでした。')
        }
    })
})

console.log(finalCategorizedLessons.value)

</script>

<template>
    <Head title="授業一覧" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">授業一覧</h2>
        </template>
        <div>
            <div>
                <div class="min-w-full divide-y divide-gray-400 bg-white shadow-xl text-center">
                    <div class="flex justify-center divide-x divide-gray-400">
                        <div v-for="time in times" :key="time.id" scope="col" class="flex-1 py-2 px-2 text-sm font-semibold text-gray-900 sm:pl-0">
                            {{ time.start }}〜{{ time.finish }}
                        </div>
                    </div>
                    <div class="flex justify-center divide-x divide-gray-400">
                        <div v-for="(time,index) in times" :key="time.id" scope="col" class="flex-1 text-sm font-semibold text-gray-900">
                            <div v-for="lesson in finalCategorizedLessons[index]" :key="lesson.id" class="grid grid-rows-2 grid-cols-4 grid-flow-col border-b border-gray-300">
                                <div class="col-span-3 border-b border-gray-300 flex">
                                    <div class="p-1 border-r border-gray-300">{{ lesson.subject1.grade }}</div>
                                    <div class="p-1 border-r border-gray-300">{{ lesson.subject1.name }}</div>
                                    <div class="flex-1 p-1">{{ lesson.student1.lastName }}&emsp;{{ lesson.student1.firstName }}</div>
                                </div>
                                <div v-if="lesson.student2.id" class="col-span-3 flex">
                                    <div class="p-1 border-r border-gray-300">{{ lesson.subject2.grade }}</div>
                                    <div class="p-1 border-r border-gray-300">{{ lesson.subject2.name }}</div>
                                    <div class="flex-1 p-1">{{ lesson.student2.lastName }}&emsp;{{ lesson.student2.firstName }}</div>
                                </div>
                                <div class="row-span-2 col-span-1 border-l border-gray-300 leading-10 pt-2">
                                    {{ lesson.teacher.lastName }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>