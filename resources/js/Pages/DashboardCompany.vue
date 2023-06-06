<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { onUpdated } from 'vue';
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

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">Dashboard
                {{ $page.props.auth.user.type_user }}</h2>
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
    </AuthenticatedLayout>
</template>
