<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import RadioInput from '@/Components/RadioInput.vue';

import { ref, nextTick } from 'vue';

let testo = usePage().props.account;
const tab = ref(testo);

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

    },
    accountDaInviare: tab

});


const account = () => {
    form.get(route('register'), {

    });
}
const reset = () => {
    const myForm = ref(null);
    console.log(myForm);
    // myForm.value.reset();

    myForm.value.reset();

}

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout class="pb-5">

        <Head title="Register" />
        <h2 class="text-center text-white text-xl pb-5">Crea un'account: {{ $page.props.account }}</h2>
        <!-- <input type="text" :name="form.account" v-model="account" :value="$page.props.account"> -->

        <form @submit.prevent="submit" ref="myForm">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 text-white">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab">
                    <li class="mr-2" role="presentation" @click="tab = 'Utente'">
                        <button type="reset" class="inline-block p-4 border-b-2 rounded-t-lg " id="profile-tab"
                            :class="tab === 'Utente' ? '' : 'border-transparent '" role="tab">Utente</button>
                    </li>
                    <li class="mr-2" role="presentation" @click="tab = 'Azienda'">
                        <button type="reset" :class="tab === 'Azienda' ? '' : 'border-transparent '"
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600  dark:hover:text-gray-300"
                            id="dashboard-tab" role="tab">Azienda</button>
                    </li>
                    <li class="mr-2" role="presentation" @click="tab = 'Ente'">
                        <button type="reset" :class="tab === 'Ente' ? '' : 'border-transparent '"
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300"
                            id="settings-tab">Ente</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div v-if="tab === 'Utente'" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile"
                    role="tabpanel" aria-labelledby="profile-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div v-if="tab !== 'Utente'" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard"
                    role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div v-if="tab !== 'Utente'" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings"
                    role="tabpanel">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
            </div>


            <div v-if="tab !== 'Utente'" class="mt-4 ">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div v-if="tab === 'Utente'" class="flex gap-4 mt-4">
                <div class=" w-1/2">
                    <InputLabel for="first_name" value="First Name" />
                    <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" autofocus
                        autocomplete="first_name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class=" w-1/2">
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
