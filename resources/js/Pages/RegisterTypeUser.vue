<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputRadioLabel from '@/Components/InputRadioLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import RadioInput from '@/Components/RadioInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import { nextTick, ref } from 'vue';

const form = useForm({
    type_user: ''
});

const submit = () => {
    form.post(route('registerTypeUser.store'), {

        // onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
const confirmingUserDeletion = ref(false);
const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    // nextTick(() => passwordInput.value.focus());
};
</script>

<template>
    <GuestLayout>

        <Head title="Register Account User Type" />

        <form @submit.prevent="submit">

            <InputRadioLabel value="Select Account User Type" class="text-center text-xl p-6 dark:text-red-600" />
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

                <PrimaryButton @click="confirmUserDeletion" class="ml-4" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Submit
                </PrimaryButton>
            </div>
        </form>
        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 v-if="form.type_user" class="text-2xl font-medium text-gray-900 dark:text-gray-100 text-center pb-5">
                    Hai scelto {{ form.type_user }}?
                </h2>
                <h2 v-else class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Devi prima selezionare un tipo di account!
                </h2>


                <p v-if="form.type_user == 'Azienda'" class="mt-1 text-md text-center text-gray-600 dark:text-gray-400">
                    Una volta creato l'account come {{ form.type_user }} non potrai più tornare in dietro
                </p>
                <p v-if="form.type_user == 'Ente'" class="mt-1 text-md text-center text-gray-600 dark:text-gray-400">
                    Una volta creato l'account come {{ form.type_user }} non potrai più tornare in dietro
                </p>
                <p v-if="form.type_user == 'Utente'" class="mt-1 text-md text-center text-gray-600 dark:text-gray-400">
                    Una volta creato l'account come {{ form.type_user }} non potrai più tornare in dietro
                </p>


                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <!-- <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton> -->
                </div>
            </div>
        </Modal>
    </GuestLayout>
</template>
