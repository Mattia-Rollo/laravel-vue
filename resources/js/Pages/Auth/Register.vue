<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import RadioInput from '@/Components/RadioInput.vue';

import { ref, nextTick } from 'vue';
import SelectInput from '@/Components/SelectInput.vue';

// let testo = usePage().props.account;
const tab = ref('jobseeker');

const form = useForm({
    name: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    employer: {
        piva: '',
        logo: ''
    },
    jobseeker: {
        gender: '',
    },
    address: '',
    comune: '',
    cap: '',
    province: '',
    accountSelected: tab


});

console.log(usePage().props)

const account = () => {
    form.get(route('register'), {

    });
}
// const reset = () => {
//     const myForm = ref(null);
//     console.log(myForm);
//     // myForm.value.reset();

//     myForm.value.reset();

// }

const chooiseAccount = (account) => {
    tab.value = account;
    form.reset();
    form.accountSelected = account;
    form.clearErrors();
}

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


const inputfile = ref(null)
// function readImgUrlAndPreview() {

    // const inputFile = document.getElementById('input_file_img');
    // const inputFile = inputfile.value;
    // console.log(inputfile);
    // // inputfile.value = '';

    // let oFReader = new FileReader();
    // oFReader.readAsDataURL(inputFile);

    // const imagePreview = document.getElementById("imagePreview");
    // oFReader.onload = function (oFREvent) {
    //     imagePreview.src = oFREvent.target.result;
    // };
    // const preview = document.getElementById("uploadPreview");
    // const imagePreview = document.getElementById('imagePreview');

    // imagePreview.classList.remove('hide');
    // const dataImage = imagePreview.dataset.image;

    // imagePreview.src = input.value;

    // if (dataImage) {
    //     console.log(dataImage);
    //     preview.src = '/storage/' + dataImage;

    // } else {
    //     preview.src = "https://via.placeholder.com/300x200";
    // }
// };

</script>

<template>
    <GuestLayout class="pb-5">

        <Head title="Register" />
        <h2 v-if="form.accountSelected == 'jobseeker'" class="text-center text-gray-800 text-xl pb-5">Crea un'account:
            Utente
        </h2>
        <h2 v-if="form.accountSelected == 'employer'" class="text-center text-gray-800 text-xl pb-5">Crea un'account:
            Azienda
        </h2>

        <!-- <input type="text" :name="form.account" v-model="account" :value="$page.props.account"> -->

        <form @submit.prevent="submit" ref="myForm">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 dark:text-white">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2" @click="chooiseAccount('jobseeker')">
                        <button type="reset" class="inline-block p-4  rounded-t-lg "
                            :class="tab === 'jobseeker' ? 'border-gray-500 dark:border-gray-200 border-b-2' : ''">Utente</button>
                    </li>
                    <li class="mr-2" @click="chooiseAccount('employer')">
                        <button type="reset"
                            :class="tab === 'employer' ? 'border-gray-500 dark:border-gray-200 border-b-2' : ''"
                            class="inline-block p-4  rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300">Azienda</button>
                    </li>
                    <li class="mr-2" @click="chooiseAccount('Ente')">
                        <button type="reset"
                            :class="tab === 'Ente' ? 'border-gray-500 dark:border-gray-200 border-b-2' : ''"
                            class="inline-block p-4  rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300">Ente</button>
                    </li>
                </ul>
            </div>

            <h2 v-if="form.accountSelected == 'jobseeker'" class="text-lg text-gray-800 text-center py-4  ">Utente</h2>
            <h2 v-if="form.accountSelected == 'employer'" class="text-lg text-gray-800 text-center py-4  ">Azienda</h2>
            <!-- <h2 v-if="form.accountSelected == 'jobseeker'" class="text-lg text-gray-800 text-center py-4  ">Utente</h2> -->

            <div id="myTabContent">
                <div class="py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400 pl-4"><strong>Attenzione</strong>
                        <span class="text-red-400 font-bold"> Compila tutti i campi</span>

                    </p>
                </div>

            </div>

            <!-- campo nome cognome utente -->

            <div v-if="tab === 'jobseeker'" class="flex gap-4 mt-4">
                <div class=" w-1/2">
                    <InputLabel for="first_name" value="Nome*" />
                    <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" autofocus
                        autocomplete="first_name" />
                    <div class="h-[16px]">
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>
                </div>
                <div class=" w-1/2">
                    <InputLabel for="last_name" value="Cognome*" />

                    <TextInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name"
                        autocomplete="last_name" />
                    <div class="h-[16px] ">
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>
                </div>
            </div>

            <!-- nome azenda  -->

            <div v-if="tab !== 'jobseeker'" class="mt-4 ">
                <InputLabel for="name" value="Nome dell'Azienda*" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="name" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
            </div>

            <!-- indirizzo cap provincia comune  -->

            <div class="mt-4 ">
                <InputLabel for="address" value="Indirizzo*" />
                <TextInput id="address" v-model="form.address" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="address" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.address" />
                </div>
            </div>
            <div class="flex gap-4 mt-4">
                <div class=" w-1/2">
                    <InputLabel for="comune" value="Città/Comune*" />
                    <TextInput id="comune" v-model="form.comune" type="text" class="mt-1 block w-full" autofocus
                        autocomplete="comune" />
                    <div class="h-[16px]">
                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>
                </div>
                <div class=" w-1/2">
                    <InputLabel for="cap" value="Cap*" />
                    <TextInput id="cap" v-model="form.cap" type="text" class="mt-1 block w-full" autofocus
                        autocomplete="cap" />
                    <div class="h-[16px]">
                        <InputError class="mt-2" :message="form.errors.cap" />
                    </div>
                </div>
            </div>
            <div class="mt-4  ">
                <InputLabel for="province" value="Provincia*" />
                <TextInput id="province" v-model="form.province" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="province" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.province" />
                </div>
            </div>

            <div v-if="tab === 'employer'" class="mt-4">
                <InputLabel for="piva" value="P.Iva*" />

                <TextInput id="piva" type="password" class="mt-1 block w-full" v-model="form.employer.piva" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.piva" />
                </div>
            </div>

            <div v-if="tab !== 'jobseeker'" class="mt-4 ">
                <InputLabel for="logo" value="Logo*" class="" />
                <!-- <input id="logo" type="file" class="mt-1 block w-full" autofocus autocomplete="logo" /> -->

                <!-- <div class="file_upload p-5 relative border-4 border-dotted border-gray-300 rounded-lg w-full"> -->
                <!-- <svg class="text-indigo-500 w-32 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg> -->
                <div class="mt-1">
                    <!-- <label> -->
                    <!-- <input class="text-sm cursor-pointer w-36 hidden" type="file" multiple /> -->
                    <!-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Upload file</label> -->


                    <!-- <div clas="file_input_wrap">
                                <input ref="inputfile" @change="readImgUrlAndPreview()" type="file" name="imageUpload"
                                    id="imageUpload" class="hide" />
                                <label for="imageUpload" class="btn btn-large">Select file</label>
                            </div>

                            <div class="img_preview_wrap">
                                <img src="" id="imagePreview" alt="Preview Image" width="200px" class="hide" />
                            </div> -->
                    <!-- </label> -->

                    <!-- </div> -->
                    <label>
                        <input type="file" class=" text-sm text-grey-500
                            file:mr-5 file:py-2 file:px-6
                            file:rounded-md file:border-0
                            file:text-sm file:font-medium
                            file:bg-blue-50 file:text-blue-700
                            hover:file:cursor-pointer hover:file:bg-amber-50
                            hover:file:text-amber-700
                        " />
                    </label>

                </div>
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.employer.logo" />
                </div>
            </div>



            <div v-if="tab === 'jobseeker'" class=" w-full mt-4">
                <InputLabel for="gender" value="Genere*" />


                <SelectInput id="gender" class="mt-1 block w-full" v-model="form.jobseeker.gender"
                    :options="['Uomo', 'Donna']" />

                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.gender" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email*" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" autocomplete="email" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password*" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                    autocomplete="new-password" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Conferma Password*" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" autocomplete="new-password" />
                <div class="h-[16px]">
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
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
                Già registrato?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrati
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>


<style scoped>
.hide {
    display: none;
}

.btn {
    display: inline-block;
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333333;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #ddd;
    box-shadow: 2px 2px 10px #eee;
    border-radius: 4px;
}

.btn-large {
    padding: 11px 19px;
    font-size: 17.5px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

#imagePreview {
    margin: 15px 0 0 0;
    border: 2px solid #ddd;
}
</style>