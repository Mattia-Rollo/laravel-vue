<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { onUpdated } from 'vue';
import { usePage } from '@inertiajs/vue3';

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

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">Dashboard</h2>
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
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur reiciendis, alias modi cupiditate
            fuga eligendi nulla similique. Quibusdam dolores vero saepe! Architecto enim, ullam illo vel quidem ea
            deserunt voluptatum libero corporis maxime delectus perspiciatis sequi provident? Amet, molestias vel
            autem tempore commodi odit quod rerum aperiam eligendi saepe nam expedita possimus alias temporibus!
            Corporis libero, asperiores tempora quae, pariatur similique consequuntur ab quo, aperiam dolorum
            repellendus ipsa magni dolore amet ipsam harum nemo saepe ut sapiente sint laudantium. Nulla corporis
            doloremque, in tempora ut est debitis sit. Quae quibusdam a ipsum fugiat soluta repudiandae itaque
            cumque eos, ullam corrupti, libero quasi beatae cupiditate atque veritatis sapiente non culpa ea
            obcaecati magnam ipsa ab praesentium temporibus debitis. Assumenda illo earum dicta necessitatibus enim
            officia dolor blanditiis, odio deserunt quo veritatis esse aliquid odit voluptates praesentium commodi
            debitis inventore sapiente, quibusdam ipsam! Voluptates natus non, nulla nam aliquam perspiciatis
            consequuntur qui deleniti officia magni repellendus itaque omnis voluptatum officiis odio aliquid? In
            consequuntur laudantium recusandae? Explicabo, atque? Ullam minima nobis laborum quam hic sequi,
            molestiae autem ducimus tempora eius. Aut perspiciatis corporis architecto nostrum nobis, itaque
            officiis. Voluptas laborum quisquam non libero mollitia expedita praesentium impedit tenetur? Dolorem,
            sint modi cumque libero omnis ipsa ea! Eaque veritatis laborum ratione magnam similique. Odit,
            doloribus! Suscipit, similique! Placeat ipsa eligendi dolor alias voluptates non sequi doloribus eaque
            cum consequatur, autem eveniet eum at, dolores sint culpa iste quod quibusdam quisquam earum quasi
            natus. Iure voluptas, eaque dolorem beatae suscipit iusto ullam possimus, ab quo vitae molestias,
            provident corrupti debitis ratione explicabo illum doloribus aliquam in optio saepe quae alias. Dicta
            exercitationem nemo vero consequuntur consectetur, animi quas quibusdam itaque iure dolores blanditiis,
            fugit optio dolor est rerum, inventore distinctio temporibus dolore modi nam corrupti quam soluta
            dolorum. Libero, asperiores doloribus ad minus exercitationem modi fugiat nihil vero mollitia itaque
            sint cum rem nostrum repellat temporibus sapiente fuga, dolores impedit expedita ea. Optio soluta sunt
            sit ipsam rem explicabo, ad exercitationem atque repellat omnis nihil possimus doloremque nulla quas id
            commodi excepturi voluptatem tempora repudiandae, delectus nisi nesciunt aliquam. Consequatur quasi iste
            eum eaque amet earum consectetur voluptatum reprehenderit corrupti quisquam iusto doloribus voluptates
            itaque laudantium explicabo, similique aspernatur quidem minus numquam tempore aperiam labore. Culpa sit
            debitis odio quo dolore, nihil iusto molestiae sint asperiores, excepturi nisi tempora. Quis porro
            voluptatum quasi consectetur incidunt doloremque hic quos alias, quo veritatis ut voluptas, corrupti
            dignissimos, odio harum. Ex fugit voluptatum quia non labore maxime assumenda beatae nihil! Omnis
            incidunt at voluptatum, similique quae facere, ipsam perferendis, porro numquam in quibusdam consequatur
            tempora nesciunt? Harum tempora quas voluptatibus impedit. Quia, repudiandae ut nesciunt fuga, impedit
            laboriosam error consequuntur magnam nemo qui tempora vero rem vel fugiat nulla non aliquam ducimus?
            Magnam nihil illo aperiam recusandae necessitatibus temporibus. Maiores voluptates rerum sapiente at
            soluta veniam id accusamus rem nisi iste excepturi est dicta, consectetur eos. Nemo commodi molestias
            nulla, dolorum repellendus ipsa eveniet asperiores vel numquam dicta autem sapiente vero itaque minus
            laudantium, maiores eaque nam. Cum qui laudantium temporibus porro at deleniti doloremque maxime debitis
            distinctio? Necessitatibus praesentium soluta incidunt! Numquam dolores maxime veniam dolore pariatur
            nesciunt, consequuntur quis aperiam libero sunt nisi nobis autem voluptate illum optio sequi inventore
            nihil. Adipisci, at quasi quae fuga perferendis aliquid dolorem sapiente laudantium aspernatur nesciunt
            dicta! Iusto expedita optio velit molestias possimus reprehenderit adipisci, inventore vero quas ullam,
            sint dignissimos porro ad? Nemo aperiam obcaecati nesciunt expedita cumque distinctio, pariatur
            doloremque recusandae maxime exercitationem doloribus tempora sapiente sit molestiae, esse a veritatis
            explicabo placeat. Est unde nulla numquam assumenda molestiae tenetur perferendis id facere velit
            maiores cumque, natus sit. Eius doloremque dolore quis. Non sint, explicabo at cupiditate molestiae,
            inventore repellendus perferendis incidunt maxime labore voluptate aliquid sunt accusamus delectus
            maiores ea optio voluptatibus aliquam voluptates officiis suscipit. Temporibus qui unde tempora
            consectetur saepe nobis animi maxime libero ad nisi nam, voluptatibus perspiciatis rerum illo adipisci
            at? Reiciendis totam quod nihil maxime veniam minima velit odio quis, veritatis cum unde soluta cumque
            eos nulla distinctio alias quasi fugit voluptatem, qui, ea architecto. Praesentium ipsam repellat
            accusantium facilis vitae reprehenderit. Nihil dolorem deserunt, dignissimos facere ad error neque
            asperiores eius ipsum alias quam fugit, debitis, quibusdam cum sit possimus? Quasi commodi vitae illum
            aperiam, ex neque iusto similique impedit, ab veritatis debitis vel, mollitia placeat adipisci quisquam
            cumque laudantium accusantium doloremque repellat nemo aliquid dolores? Deserunt quibusdam nemo dolor
            itaque non, tempora sint? Soluta quaerat dignissimos provident sint, laudantium aliquam, harum
            voluptatibus doloribus quae illum, ad amet nulla tenetur odit enim saepe? Cumque ea officiis vitae non
            corrupti placeat, molestiae quam. Aperiam minus illum officia, in atque fuga, veritatis omnis
            consectetur expedita officiis maiores quidem cumque a quam! Veritatis natus explicabo illum tenetur
            voluptates delectus assumenda, voluptatem velit suscipit qui totam repellendus maxime ea aut voluptas
            eius ab ratione unde. Voluptatibus, porro sapiente iste laudantium amet eius perferendis dolorum ducimus
            ullam at modi beatae? Excepturi perferendis perspiciatis beatae cumque nemo, expedita facere itaque
            illum debitis reiciendis autem praesentium nam eum accusamus delectus deserunt qui dolorum unde
            repellendus, dicta ipsam fugit? Id nisi aperiam totam incidunt velit molestiae, maxime magni vel natus
            ea iusto praesentium beatae omnis alias. Laborum amet tenetur pariatur facere sint? Voluptatem iste,
            incidunt cumque, doloremque numquam vitae quasi ratione ex nam ad odio vero id? Sint, obcaecati impedit.
            Eveniet cumque corrupti odit soluta quaerat tenetur iure omnis fugiat non hic eum dolore sint expedita,
            suscipit alias neque excepturi minus iste voluptas. Reiciendis nemo cupiditate, saepe maxime sapiente
            odit fugiat quia excepturi recusandae quo velit accusamus consequuntur nisi enim! Culpa, illum
            accusantium. Quo nisi expedita eligendi reprehenderit fugit iusto, repellat corrupti, delectus id, vitae
            exercitationem voluptas. Voluptatum mollitia suscipit quae optio quisquam sunt similique numquam
            veritatis natus impedit delectus, eum atque sit velit saepe? Eveniet nisi vero facilis autem eligendi
            veritatis sed, impedit quae officiis tenetur, ad ullam dicta, ex laborum nihil. Laboriosam sequi beatae
            officiis vero, deserunt esse optio explicabo atque necessitatibus adipisci similique ut facere magni
            quisquam tempore quas cumque deleniti impedit doloremque eligendi corrupti minima excepturi architecto!
            Nulla perferendis vel qui illum similique dolor soluta quod alias perspiciatis, officiis magni expedita
            aliquid magnam earum aperiam et inventore amet architecto id aliquam. Eligendi omnis unde praesentium,
            tempore deserunt laboriosam recusandae explicabo. Magni, odio porro corrupti autem adipisci alias
            ducimus esse ratione cum qui odit perferendis ipsam accusamus numquam veritatis quod harum maiores
            voluptatibus deserunt? Quisquam officia magni ipsam aperiam dolorem rerum est magnam pariatur, excepturi
            natus nostrum cupiditate sunt nesciunt autem earum vel possimus ipsa atque. Odit repellendus omnis sunt!
            Nobis, libero itaque eveniet natus necessitatibus blanditiis dicta facere, perferendis praesentium
            dolorum iste deserunt quibusdam sapiente dignissimos vitae recusandae nam, quaerat eos fugit sint eius
            sequi tempore ipsa facilis! Ad animi molestiae accusantium. Laudantium ad at dicta dolorum obcaecati eum
            sit, sint vitae non? Repellat labore in deleniti assumenda ipsum dolores vel porro obcaecati deserunt,
            inventore doloremque ea voluptate tempore reprehenderit quasi quia quis accusantium optio incidunt animi
            veritatis. Natus deserunt aliquam quidem voluptates, rem at fugit aliquid suscipit magnam hic
            perferendis totam eos magni minus ipsum animi nobis eveniet fugiat. Dolorem, veniam provident? Provident
            tempora ullam temporibus incidunt quo, suscipit sequi excepturi quisquam accusantium exercitationem aut
            error. Ullam sapiente suscipit officia commodi libero.</div>
    </AuthenticatedLayout>
</template>
