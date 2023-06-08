<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from '../../Profile/Partials/DeleteUserForm.vue';
import UpdatePasswordForm from '../../Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '../../Profile/Partials/UpdateProfileInformationForm.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { nextTick, ref, computed } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    user: {
        type: Object
    },
    jobseeker: {
        type: Object
    }
});

const user = usePage().props.auth.user

console.log(user)

const fullname = user.jobseeker.first_name + ' ' + user.jobseeker.last_name;

// console.log(user)
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Profile</h2>
        </template>

        <div class="pt-4 text-black">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex gap-5">
                    <div class="w-2/3 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-h-56">
                        <!-- <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" /> -->
                        <h1 class="text-3xl pb-9">{{ fullname }}</h1>


                        <div><span class="text-lg font-bold text-gray-400">Indirizzo:</span> {{ $props.jobseeker.street }},
                            {{ $props.jobseeker.cap }}, {{ $props.jobseeker.city }} ({{
                                $props.jobseeker.province }}), {{ $props.jobseeker.district }}</div>
                        <div><span class="text-lg font-bold text-gray-400 pb-14">Email: </span> {{
                            $page.props.auth.user.email }}
                        </div>
                    </div>
                    <!-- <div class="   bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center max-h-64 overflow-hidden"> -->
                    <!-- <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" /> -->
                    <img class="w-1/4 rounded-lg block shadow-2xl"
                        src="https://media.licdn.com/dms/image/D4E03AQFaA7j57nPhiw/profile-displayphoto-shrink_800_800/0/1674924617184?e=1691625600&v=beta&t=AOpBFqyJONWQCDGNd5SwbLr6f8xZju_vxHWlD7kGt3w"
                        alt="" />
                    <!-- </div> -->
                </div>



                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <!-- <UpdatePasswordForm class="max-w-xl" /> -->

                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <!-- <DeleteUserForm class="max-w-xl" /> -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
