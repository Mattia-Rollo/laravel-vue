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
    company: '',
    position: '',
    description: '',
    date: ''

});
</script>

<template>
    <Head title="Istruzione" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Esperienza</h2>
        </template>


        <div class="pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <h2 class="text-3xl py-3 text-gray-800">
                    Aggiungi esperienza</h2>

                <form @submit.prevent="form.post(route('experiences.store'))" class="mt-6 ">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg space-y-8">

                        <div>
                            <InputLabel for="position" value="Posizione" />

                            <TextInput id="position" type="text" class="mt-1 block w-full text-black"
                                v-model="form.position" required autofocus autocomplete="position" />

                            <InputError class="mt-2" :message="form.errors.position" />
                        </div>

                        <div>
                            <InputLabel for="company" value="Azienda" />

                            <TextInput id="company" type="text" class="mt-1 block w-full text-black" v-model="form.company"
                                required autofocus autocomplete="company" />

                            <InputError class="mt-2" :message="form.errors.company" />
                        </div>



                        <div>
                            <InputLabel for="description" value="Descrizione" />

                            <textarea name="description" type="text" v-model="form.description" required autofocus
                                id="description" class="w-full rounded-md text-black" rows="5"></textarea>
                            <!-- <input id="description" type="description" class="mt-1 block w-full text-black" v-model="form.date" required
                                autofocus autocomplete="date" /> -->

                            <InputError class="mt-2" :message="form.errors.description" />
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
