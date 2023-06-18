<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import DeleteUserForm from '../../Profile/Partials/DeleteUserForm.vue';
// import UpdatePasswordForm from '../../Profile/Partials/UpdatePasswordForm.vue';
// import UpdateProfileInformationForm from '../../Profile/Partials/UpdateProfileInformationForm.vue';
import { Head, usePage, Link, useForm, router } from '@inertiajs/vue3';
import { nextTick, ref, computed, reactive } from 'vue';
// import { Inertia } from 'inertiajs/inertia';


const props = defineProps({
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
    },
    experiences: {
        type: Array
    },
    education: {
        type: Array
    }
});

// const auth = usePage().props.auth
const user = usePage().props.auth.user

console.log(user)

const fullname = props.jobseeker.first_name + ' ' + props.jobseeker.last_name;

console.log(user)

const form = useForm({
    id: ''
});


const handleDelete = (id) => {
    if (confirm('Sei sicuro di voler eliminare questo prodotto?')) {
        console.log(id);
        // break;
        form.delete(route('experiences.destroy', id),
        );

        // location.reload();
        // router.reload();
        // this.$inertia.reload();
    }
};

</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Profile</h2>
        </template>

        <div class="pt-4 text-black">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="flex gap-5 ">
                    <div
                        class="w-4/5 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg h-100 hover:shadow-2xl transition-all relative">

                        <h1 class="text-3xl pb-9">{{ fullname }}</h1>


                        <div><span class="text-lg font-bold text-gray-400">Indirizzo:</span> {{
                            user.address.street }},
                            {{ user.address.cap }}, {{ user.address.city }} ({{
                                user.address.province }}), {{ user.address.district }}</div>
                        <div><span class="text-lg font-bold text-gray-400 pb-14">Email: </span> {{
                            user.email }}
                        </div>
                        <Link :href="route('dashboard')"
                            class=" absolute right-0 top-0 self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300 rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                        <i class="fa-solid fa-pen "></i> modifica
                        </Link>


                    </div>

                    <!-- immagine profilo  -->
                    <div class="w-1/5 shadow-xl relative rounded-lg">
                        <img class="rounded-lg block h-full object-cover hover:shadow-2xl transition-all "
                            :src="'/storage/' + user.profile_image_path" alt="" />
                        <Link :href="route('profile-image.image')"
                            class=" absolute right-0 top-0 bg-opacity-50  self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                        <i class="fa-solid fa-pen "></i> modifica
                        </Link>


                    </div>

                </div>


                <div class="flex ">
                    <h2 class="text-2xl py-3 ">
                        Istruzione</h2>
                    <Link :href="route('education.create')"
                        class="ml-auto self-center inline-block bg-white  text-gray-600  hover:bg-slate-100 dark:text-gray-300  rounded-md p-1  transition-all hover:text-black cursor-pointer hover:underline hover:shadow-2xl ">
                    <i class="fa-solid fa-plus"></i> aggiungi titolo
                    </Link>
                </div>
                {{ console.log(user) }}
                <div v-for="( item, index ) in  education " :key="index"
                    class="p-4 sm:p-5 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-2 relative">
                    <div>

                        <div class="font-bold text-lg">{{ item.degree }}</div>
                        <div>{{ item.institution }}</div>
                        <div>{{ item.start_year }}</div>

                        <Link :href="route('education.edit', item.id)"
                            class="absolute right-0 top-0 self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                        <i class="fa-solid fa-pen "></i> modifica
                        </Link>
                        <Link :href="route('education.destroy', item.id)"
                            class=" absolute right-0 top-10 self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all cursor-pointer hover:underline hover:text-red-700">
                        <i class="fa-solid fa-trash"></i> Elimina
                        </Link>
                    </div>

                    <!-- {{ user.jobseeker.education[0].degree }} -->
                </div>


                <div class="flex">
                    <h2 class="text-2xl py-3">Esperienze di lavoro</h2>
                    <Link :href="route('experiences.create')"
                        class="ml-auto self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-1  transition-all hover:text-black cursor-pointer hover:underline">
                    <i class="fa-solid fa-plus"></i> aggiungi esperienza
                    </Link>

                </div>

                <div v-for="( item, index ) in  experiences" :key="index"
                    class="p-4 sm:p-5 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-2 relative">
                    <div>
                        <div class="font-bold text-xl">{{ item.position }}</div>
                        <div>{{ item.company }}</div>
                        <div>{{ item.description }}</div>
                        <div>{{ item.start_year }}</div>

                        <Link :href="route('experiences.edit', item.id)"
                            class="absolute right-0 top-0 self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer hover:underline">
                        <i class="fa-solid fa-pen"></i> modifica
                        </Link>
                        <button @click="handleDelete(item.id)"
                            class=" absolute right-0 top-10 self-center inline-block bg-white hover:bg-slate-100 text-gray-600  dark:text-gray-300  rounded-md p-2  transition-all cursor-pointer hover:underline hover:text-red-700">
                            <i class="fa-solid fa-trash"></i> Elimina
                        </button>
                    </div>

                    <!-- {{ user.jobseeker.education[0].degree }} -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
