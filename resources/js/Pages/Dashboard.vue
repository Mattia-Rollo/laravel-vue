<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { onUpdated } from 'vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// onMounted(() => {
//     console.log(`the component is now mounted.`);
//     console.log($slots);
// })
onMounted(() => {
    setTimeout(() => {
        console.log(usePage().props);
        usePage().props.flash.message = ''

    }, 1000);
})


const images = ref([
    'https://images.freeimages.com/images/large-previews/218/my-dog-cutter-1499799.jpg',
    'path/to/image2.jpg',
    'path/to/image3.jpg',
    // ...
]);
// const currentIndex = ref(0);

function backgroundStyle(index) {
    return {
        'background-image': `url(${images.value[index]})`
    };
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">Dashboard {{
                $page.props.auth.user.type_user }} {{ $page.props.auth.user.name }}</h2>
        </template>

        <div v-if="$page.props.flash.message" class="pb-4 relative">
            <div class="w-full mx-auto absolute top-0">
                <div class="bg-white dark:bg-gray-800 dark:bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900 dark:text-gray-100"> You're logged in! 
                    </div> -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $page.props.flash.message }} {{
                            $page.props.auth.user.name }}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="max-w-sm w-full lg:max-w-full lg:flex mt-3" v-for="(item, index) in images" :key="item">


                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url('https://images.freeimages.com/images/large-previews/218/my-dog-cutter-1499799.jpg')"
                    title="Woman holding a mug">
                </div>
                <div
                    class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?
                        </div>
                        <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium
                            nihil.</p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                            <p class="text-gray-600">Aug 18</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
