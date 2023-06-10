<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';
import NavTopDashboard from '@/Components/NavTopDashboard.vue';
import { onMounted } from 'vue';
import Swal from 'sweetalert2';

const showingNavigationDropdown = ref(false);

const type_user = usePage().props.auth.user.type_user
const user = usePage().props.auth.user
const page = usePage()

onMounted(() => {
    if (page.props.flash.message) {
        welcome();
    }
    page.props.flash.message = ''


})

const welcome = () => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        // didOpen: (toast) => {
        //     toast.addEventListener('mouseenter', Swal.stopTimer)
        //     toast.addEventListener('mouseleave', Swal.resumeTimer)
        // }
    })

    Toast.fire({
        icon: 'success',
        title: page.props.flash.message + ' ' + user.name
    })
}
</script>

<template>
    <div class="bg-dots-darker min-h-screen bg-gray-100 dark:bg-gray-900">


        <!-- Page Heading -->
        <!-- <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header> -->

        <!-- Page Content -->
        <div class="wrapper flex h-[100vh]">

            <!-- left side  -->
            <div class="h-full text-black w-16 md:w-64 transition-all shrink-0 p-4">
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl h-full w-full p-3 font-bold 
                    2">
                    <Link :href="route('dashboard')" :active="route().current('dashboard')"
                        class="block text-gray-800 dark:text-gray-300 rounded-md p-2 mb-1  hover:text-black transition-all  cursor-pointer ">
                    <i class="fa-solid fa-house ml-3 mr-2"></i><span> Dashboard</span> </Link>

                    <div class="border-b border-gray-400 mb-1"></div>

                    <Link v-if="type_user === 'jobseeker'" :href="route('annunci')" :active="route().current('annunci')"
                        class="block text-gray-800 dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer">
                    <i class="fa-solid fa-scroll ml-3 mr-2"></i><span>Offerte di lavoro</span>
                    </Link>


                    <!-- mi serve una rotta che porta alla edit del profilo di un utente ma con l'entita utente da creare -->
                    <!-- <Link v-if="type_user === 'jobseeker'" :href="route('profile.edit')"
                        :active="route().current('profile.edit')"
                        class="block text-gray-800 dark:text-gray-300  rounded-md p-2 transition-all hover:text-black cursor-pointer">
                    <i class="fa-solid fa-user ml-3 mr-2"></i><span>Il mio profilo</span>
                    </Link> -->
                    <!-- {{ console.log(user) }} -->
                    <!-- <div v-if="!route().current('curriculum.show')"> -->
                    <Link v-if="type_user === 'jobseeker'" :href="route('curriculum.show', user.jobseeker.id)"
                        :active="route().current('curriculum.show')"
                        class="block text-gray-800 dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer">
                    <i class="fa-solid fa-passport  ml-3 mr-2"></i>
                    <span>Il mio CV</span>
                    </Link>
                    <!-- </div> -->

                    <Link :href="route('profile.edit')" :active="route().current('profile.edit')"
                        class="block text-gray-800 dark:text-gray-300  rounded-md p-2 transition-all hover:text-black cursor-pointer">
                    <i class="fa-solid fa-gear ml-3 mr-2"></i><span>Impostazioni</span>
                    </Link>

                    <Link v-if="type_user === 'employer'" :href="route('annunci')" :active="route().current('annunci')"
                        class="block text-gray-800 dark:text-gray-300  rounded-md p-2  transition-all hover:text-black cursor-pointer">
                    <i class="fa-solid fa-scroll ml-3 mr-2"></i><span>Proposte di Lavoro</span>
                    </Link>

                </div>
            </div>

            <!-- right side -->
            <main class="w-50 p-4 dark:text-white max-h-100% overflow-auto w-full">
                <NavTopDashboard />
                <slot />
            </main>
        </div>
    </div>
</template>


<style scoped>
a[active="true"] {
    background-color: rgb(209 213 219 / var(--tw-bg-opacity));
    color: rgb(31 41 55 / var(--tw-text-opacity));
}

a:hover:not(*[active="true"]) {
    transform: translateX(10px);
}

.bg-dots-darker {
    /* background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E"); */
    background-color: #8EC5FC;
    background-image: linear-gradient(62deg, #d1e8ff 0%, #ebd6ff 100%);
}
</style>
