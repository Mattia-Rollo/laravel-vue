<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from '../../Profile/Partials/DeleteUserForm.vue';
import UpdatePasswordForm from '../../Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '../../Profile/Partials/UpdateProfileInformationForm.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';
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

const auth = usePage().props.auth
const user = usePage().props.auth.user

// console.log(auth)

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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="flex gap-5">
                    <div class="w-4/5 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg h-100">

                        <h1 class="text-3xl pb-9">{{ fullname }}</h1>


                        <div><span class="text-lg font-bold text-gray-400">Indirizzo:</span> {{
                            user.address.street }},
                            {{ user.address.cap }}, {{ user.address.city }} ({{
                                user.address.province }}), {{ user.address.district }}</div>
                        <div><span class="text-lg font-bold text-gray-400 pb-14">Email: </span> {{
                            user.email }}
                        </div>

                    </div>

                    <!-- immagine profilo  -->
                    <img class="w-1/5 rounded-lg block shadow-2xl object-cover"
                        src="https://media.licdn.com/dms/image/D4E03AQFaA7j57nPhiw/profile-displayphoto-shrink_800_800/0/1674924617184?e=1691625600&v=beta&t=AOpBFqyJONWQCDGNd5SwbLr6f8xZju_vxHWlD7kGt3w"
                        alt="" />

                </div>


                <div class="flex mt-2">
                    <h2 class="text-3xl py-3">
                        Istruzione</h2>
                    <Link :href="route('istruzione.create')"
                        class="ml-auto self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                    <i class="fa-solid fa-plus"></i> aggiungi titolo
                    </Link>
                </div>
                <!-- {{ console.log(user.jobseeker.education) }} -->
                <div v-for="(item, index) in user.jobseeker.education" :key="index"
                    class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-2">
                    <div>
                        <div class="font-bold text-lg">{{ item.degree }}</div>
                        <div>{{ item.institution }}</div>
                        <div>{{ item.start_year }}</div>
                    </div>

                    <!-- {{ user.jobseeker.education[0].degree }} -->
                </div>


                <div class="flex">
                    <h2 class="text-3xl py-3">
                        Esperienze di lavoro</h2>
                    <Link :href="route('esperienze.create')"
                        class="ml-auto self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                    <i class="fa-solid fa-plus"></i> aggiungi esperienza
                    </Link>
                </div>

                <div v-for="(item, index) in user.jobseeker.experience" :key="index"
                    class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-2">
                    <div>
                        <div class="font-bold text-xl">{{ item.position }}</div>
                        <div>{{ item.company }}</div>
                        <div>{{ item.start_year }}</div>
                    </div>

                    <!-- {{ user.jobseeker.education[0].degree }} -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
