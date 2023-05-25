<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import RadioInput from '@/Components/RadioInput.vue';

const form = useForm({
    name: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    azienda: {
        piva: ''
    },
    utente: {

    }

});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <h2 class="text-center text-white text-xl">Crea un'account: {{ $page.props.account }}</h2>
        <form @submit.prevent="submit">
            <div v-if="$page.props.account !== 'Utente'" class="mt-4 ">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div v-if="$page.props.account === 'Utente'" class="flex gap-4">
                <div class="mt-4 w-1/2">
                    <InputLabel for="first_name" value="First Name" />
                    <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" required
                        autofocus autocomplete="first_name" />
                    <InputError class="mt-2" :message="form.errors.first_name" />
                </div>
                <div class="mt-4 w-1/2">
                    <InputLabel for="last_name" value="Last Name" />

                    <TextInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" required
                        autofocus autocomplete="last_name" />

                    <InputError class="mt-2" :message="form.errors.first_name" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div v-if="$page.props.account !== 'Utente'" class="mt-4">
                <InputLabel for="P.IVA" value="Partita Iva" />

                <TextInput id="P.IVA" type="password" class="mt-1 block w-full" v-model="form.azienda.piva" required />

                <InputError class="mt-2" :message="form.errors.piva" />
            </div>
            <!-- <InputLabel for="type_user" value="Select type" class="mt-4" />
            <div class="mt-4 flex">

                <TextInput id="type_user" name="type_user" type="radio" class="mt-1 block" v-model="Utente" required />

                <InputLabel for="type_user" value="Utente" class="px-4" />

                <TextInput id="type_user" name="type_user" type="radio" class="mt-1 block" v-model="Azienda" required />
                <InputLabel for="type_user" value="Azienda" class="px-4" />

                <TextInput id="type_user" name="type_user" type="radio" class="mt-1 block" v-model="Ente" required />
                <InputLabel for="type_user" value="Ente" class="px-4" />

            </div>
            <InputError class="mt-2" :message="form.errors.type_user" /> -->

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
