<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { onUpdated } from 'vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

// onMounted(() => {
//     console.log(`the component is now mounted.`);
//     console.log($slots);
// })
onMounted(() => {
    setTimeout(() => {
        console.log(usePage().props);
        usePage().props.flash.message = ''

    }, 1000);
})


const images = ref([
    {
        titolo: 'full-stack',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/10994276-adidas-logo-simbolo-abiti-design-icona-astratto-calcio-vettore-illustrazione-gratuito-vettoriale.jpg',
        descrizione: "Opportunità di carriera: Azienda leader nel settore tecnologico cerca un programmatore esperto per unirsi al suo team di sviluppo. Offriamo un ambiente di lavoro dinamico, progetti stimolanti e possibilità di crescita professionale. Se sei appassionato di tecnologia e desideri mettere alla prova le tue competenze, questa potrebbe essere l'opportunità che stai cercando."
    },
    {
        titolo: 'Venditore Porta a Porta',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/10994232-nike-logo-nero-abiti-design-icona-astratto-calcio-vettore-illustrazione-con-bianca-sfondo-gratuito-vettoriale.jpg',
        descrizione: "Cercasi responsabile delle vendite: Importante azienda nel settore commerciale è alla ricerca di un professionista motivato ed energico per guidare il dipartimento delle vendite. Offriamo un pacchetto retributivo competitivo, un ambiente di lavoro stimolante e la possibilità di far crescere la tua carriera nel settore delle vendite. Se sei orientato al raggiungimento degli obiettivi e hai esperienza nel settore, candidati subito!"
    },
    {
        titolo: 'Dottore',
        image: 'https://static.vecteezy.com/ti/vettori-gratis/p3/17792880-coca-coca-cola-logo-popolare-bevanda-marca-logo-gratuito-vettoriale.jpg',
        descrizione: "Offerta di lavoro nel settore sanitario: Clinica rinomata sta cercando un infermiere con esperienza per unirsi al suo team dedicato. Offriamo un ambiente di lavoro collaborativo, opportunità di formazione continua e la possibilità di fare la differenza nella vita delle persone. Se sei appassionato di assistenza sanitaria e desideri contribuire a migliorare la salute e il benessere degli altri, questa potrebbe essere l'opportunità che stai cercando."
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
    <Head title="Offerte di lavoro" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">Dashboard {{
                $page.props.auth.user.type_user }} {{ $page.props.auth.user.name }}</h2>
        </template>



        <!-- aggiunto  -->
        <!-- <div class="flex items-center justify-end mb-8">
            <div class="flex items-center mr-4">
                <span class="text-gray-600 dark:text-white mr-2">John Doe</span>
                <img class="w-8 h-8 rounded-full" src="" alt="Avatar">
            </div>
            <button class="bg-indigo-500 text-white rounded-lg py-2 px-4">
                Logout
            </button>
        </div> -->



        <h1 class="text-2xl font-bold text-gray-900 dark:text-white pb-4">Offerte di lavoro</h1>
        <div class="max-w-full max-h-36 bg-white rounded-xl shadow-md overflow-hidden mb-3" v-for="(item, index) in images"
            :key="index">
            <div class="md:flex">
                <!-- <div class="md:flex-shrink-0 w-2/12">
                    <img class="h-36 object-contain md:w-36" :src="item.image" alt="Immagine dell'annuncio"
                        style="background-position: center;">
                </div> -->
                <div class="p-8 w-10/12">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Posizione</div>
                    <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{
                        item.titolo }}</a>
                    <p id="descrizione" class="mt-2 text-gray-500">{{ item.descrizione }}</p>
                    <div class="">
                        <!-- <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span> -->
                    </div>
                </div>
                <div class="mt-16 text-end">
                    <a href="#" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Vedi
                        Dettagli</a>
                </div>
            </div>

        </div>



        <!-- card lunghe -->
        <!-- <div>
            <div class="max-w-sm w-full lg:max-w-full lg:flex mt-3 " v-for="(item, index) in images" :key="index">
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


            </div>
        </div> -->
    </AuthenticatedLayout>
</template>

<style>
.classe {
    background-size: cover;
}

#descrizione {

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>