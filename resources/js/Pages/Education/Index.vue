<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import DeleteUserForm from './Partials/DeleteUserForm.vue';
// import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
// import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Istruzione</h2>
        </template>


        <div class="pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <h2 class="text-3xl py-3 text-gray-800">
                    Istruzione</h2>


                <Link :href="route('education.create')"
                    class="inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer">
                aggiungi
                </Link>
                <div v-for="(item, index) in $page.props.auth.user.jobseeker.education" :key="index"
                    class="p-4 sm:p-8 text-gray-800 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>{{ item.degree }}</div>
                    <div>{{ item.institution }}</div>
                    <div>{{ item.start_year }}</div>

                    <!-- <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" /> -->
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
