<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputRadioLabel from '@/Components/InputRadioLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import RadioInput from '@/Components/RadioInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const form = useForm({
    type_user: ''
});

const submit = () => {
    form.post(route('registerTypeUser.store'), {

        // onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register Type User" />

        <form @submit.prevent="submit">

            <InputRadioLabel value="Select type" class="text-center" />
            <div class="p-4 flex justify-center">

                <input id="Utente" name="type_user" type="radio" class="mt-1 block" v-model="form.type_user" value="Utente"
                    required />

                <InputRadioLabel for="type_user" value="Utente" class="px-4 " />

                <input id="Azienda" name="type_user" type="radio" class="mt-1 block" v-model="form.type_user"
                    value="Azienda" required />
                <InputRadioLabel for="type_user" value="Azienda" class="px-4" />

                <input id="Ente" name="type_user" type="radio" class="mt-1 block" v-model="form.type_user" value="Ente"
                    required />
                <InputRadioLabel for="type_user" value="Ente" class="px-4" />

            </div>
            <!-- <InputError class="mt-2" :message="form.errors.type_user" /> -->

            <div class="flex items-center justify-between mt-4">
                <!-- <Link :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
                </Link> -->
                <Link :href="route('logout')" method="post" as="button"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Log Out
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
