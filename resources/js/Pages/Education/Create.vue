<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
// import DeleteUserForm from './Partials/DeleteUserForm.vue';
// import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
// import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
// import NavLink from '@/Components/NavLink';
// import PrimaryButton from 'vendor/laravel/breeze/stubs/inertia-react/resources/js/Components/PrimaryButton';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    degree: '',
    institution: '',
    date: ''

});
</script>

<template>
    <Head title="Istruzione" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Crea Istruzione</h2>
        </template>


        <div class="pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <h2 class="text-3xl py-3 text-gray-800">
                    Istruzione Crea</h2>

                <form @submit.prevent="form.post(route('education.store'))" class="mt-6 ">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg space-y-8">

                        <div>
                            <InputLabel for="degree" value="Titolo di studio" />

                            <TextInput id="degree" type="text" class="mt-1 block w-full text-black" v-model="form.degree"
                                required autofocus autocomplete="degree" />

                            <InputError class="mt-2" :message="form.errors.degree" />
                        </div>

                        <div>
                            <InputLabel for="institution" value="Scuola/Istituzione" />

                            <TextInput id="institution" type="text" class="mt-1 block w-full text-black"
                                v-model="form.institution" required autofocus autocomplete="institution" />

                            <InputError class="mt-2" :message="form.errors.institution" />
                        </div>

                        <div>
                            <InputLabel for="date" value="Scuola/Istituzione" />

                            <input id="date" type="date" class="mt-1 block w-full text-black" v-model="form.date" required
                                autofocus autocomplete="date" />

                            <InputError class="mt-2" :message="form.errors.date" />
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0"
                                class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.
                                </p>
                            </Transition>
                        </div>
                    </div>

                </form>




            </div>
        </div>
    </AuthenticatedLayout>
</template>
