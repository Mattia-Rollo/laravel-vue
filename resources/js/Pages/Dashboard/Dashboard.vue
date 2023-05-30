<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { onUpdated } from 'vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Swal from 'sweetalert2'

// onMounted(() => {
//     console.log(`the component is now mounted.`);
//     console.log($slots);
// })

const user = usePage().props.auth.user
const page = usePage()

onMounted(() => {
    setTimeout(() => {
        console.log(usePage().props);
        usePage().props.flash.message = ''

    }, 1000);

    if (page.props.flash.message) {
        welcome();
    }


})

const welcome = () => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: page.props.flash.message + ' ' + user.name
    })
}


const images = ref([
    {
        titolo: 'full-stack',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/10994276-adidas-logo-simbolo-abiti-design-icona-astratto-calcio-vettore-illustrazione-gratuito-vettoriale.jpg',
        descriziione: "Opportunità di carriera: Azienda leader nel settore tecnologico cerca un programmatore esperto per unirsi al suo team di sviluppo. Offriamo un ambiente di lavoro dinamico, progetti stimolanti e possibilità di crescita professionale. Se sei appassionato di tecnologia e desideri mettere alla prova le tue competenze, questa potrebbe essere l'opportunità che stai cercando."
    },
    {
        titolo: 'Portinaio',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/10994232-nike-logo-nero-abiti-design-icona-astratto-calcio-vettore-illustrazione-con-bianca-sfondo-gratuito-vettoriale.jpg',
        descriziione: "Cercasi responsabile delle vendite: Importante azienda nel settore commerciale è alla ricerca di un professionista motivato ed energico per guidare il dipartimento delle vendite. Offriamo un pacchetto retributivo competitivo, un ambiente di lavoro stimolante e la possibilità di far crescere la tua carriera nel settore delle vendite. Se sei orientato al raggiungimento degli obiettivi e hai esperienza nel settore, candidati subito!"
    },
    {
        titolo: 'Calciatore',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/17792880-coca-coca-cola-logo-popolare-bevanda-marca-logo-gratuito-vettoriale.jpg',
        descriziione: "Offerta di lavoro nel settore sanitario: Clinica rinomata sta cercando un infermiere con esperienza per unirsi al suo team dedicato. Offriamo un ambiente di lavoro collaborativo, opportunità di formazione continua e la possibilità di fare la differenza nella vita delle persone. Se sei appassionato di assistenza sanitaria e desideri contribuire a migliorare la salute e il benessere degli altri, questa potrebbe essere l'opportunità che stai cercando."
    }
    // ...
]);
// const currentIndex = ref(0);

function backgroundStyle(index) {
    return {
        'background-image': `url(${images.value[index].image})`,
        // 'background-size': 'cover'
    };
};




</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">Dashboard {{
                $page.props.auth.user.type_user }} {{ $page.props.auth.user.name }}</h2>
        </template>

        <div v-if="$page.props.flash.message" class="pb-4 relative">
            <div class="w-full mx-auto absolute top-0">
                <div class="bg-white dark:bg-gray-800 dark:bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900 dark:text-gray-100"> You're logged in! 
                    </div> -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $page.props.flash.message }} {{
                            $page.props.auth.user.name }}
                    </div>
                </div>
            </div>
        </div>
        <div>

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white pb-4">Dashboard</h1>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-8">
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-xl p-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Total Users</h2>
                    <div class="flex items-center">
                        <div class="bg-indigo-500 rounded-full h-10 w-10 flex items-center justify-center ">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="ml-4 text-3xl font-bold text-gray-900 dark:text-white">578</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-xl p-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Total Products</h2>
                    <div class="flex items-center">
                        <div class="bg-indigo-500 rounded-full h-10 w-10 flex items-center justify-center">
                            <i class="fas fa-shopping-bag text-white"></i>
                        </div>
                        <span class="ml-4 text-3xl font-bold text-gray-900 dark:text-white">254</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-xl p-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Total Orders</h2>
                    <div class="flex items-center">
                        <div class="bg-indigo-500 rounded-full h-10 w-10 flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>
                        <span class="ml-4 text-3xl font-bold text-gray-900 dark:text-white">978</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-xl p-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Revenue</h2>
                    <div class="flex items-center">
                        <div class="bg-indigo-500 rounded-full h-10 w-10 flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                        <span class="ml-4 text-3xl font-bold text-gray-900 dark:text-white">$18,756</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-8">

                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-5">
                    <img class="w-full h-3/6 object-cover"
                        src="https://posizioniaperte.com/wp-content/uploads/2021/05/nike-posizioni-aperte-1.jpg"
                        alt="Immagine della card">
                    <div class="px-6 py-4">
                        <div class="font-bold text-gray-800 dark:text-gray-300 text-xl mb-2">Titolo della card</div>
                        <p class="text-gray-700 text-base">
                            Descrizione della card. Puoi inserire qui il testo che desideri visualizzare nella card.
                        </p>
                    </div>
                    <div class="px-6 py-4">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-5">
                    <img class="w-full h-3/6 object-cover"
                        src="https://www.workisjob.com/back-end/foto/11399-nuove-opportunita-di-lavoro-in-adidas.jpg"
                        alt="Immagine della card">
                    <div class="px-6 py-4">
                        <div class="font-bold text-gray-800 dark:text-gray-300 text-xl mb-2">Titolo della card</div>
                        <p class="text-gray-700 text-base">
                            Descrizione della card. Puoi inserire qui il testo che desideri visualizzare nella card.
                        </p>
                    </div>
                    <div class="px-6 py-4">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-5">
                    <img class="w-full h-3/6 object-cover"
                        src="https://www.ticonsiglio.com/wp-content/uploads/2020/01/apple.jpg" alt="Immagine della card">
                    <div class="px-6 py-4">
                        <div class="font-bold text-gray-800 dark:text-gray-300 text-xl mb-2">Titolo della card</div>
                        <p class="text-gray-700 text-base">
                            Descrizione della card. Puoi inserire qui il testo che desideri visualizzare nella card.
                        </p>
                    </div>
                    <div class="px-6 py-4">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span>
                    </div>
                </div>
            </div>

            <!-- <div class="max-w-sm w-full lg:max-w-full lg:flex mt-3 " v-for="(item, index) in images" :key="index">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-contain bg-no-repeat bg-white bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    :style="backgroundStyle(index)" title="Woman holding a mug">
                </div>
                <div
                    class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">{{ item.titolo }}
                        </div>
                        <p class="text-gray-700 text-base">{{ item.descriziione }}</p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4 "
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
                            alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                            <p class="text-gray-600">Aug 18</p>
                        </div>
                    </div>
                    <div class="self-end">
                        <PrimaryButton class="dark:hover:bg-cyan-500 dark:hover:text-white">Apply</PrimaryButton>
                    </div>
                </div>


            </div> -->
        </div>
    </AuthenticatedLayout>
</template>