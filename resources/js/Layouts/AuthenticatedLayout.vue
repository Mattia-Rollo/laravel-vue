<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
// import { onMounted } from 'vue';

const showingNavigationDropdown = ref(false);

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <div class="wrapper flex">
                <div class="h-[100vh] text-black w-16 md:w-[300px] transition-all shrink-0 p-4">
                    <div class="bg-green-300 rounded-md h-full w-full p-3 font-bold text-lg
                    2">
                        <div
                            class="rounded-md p-2 mb-2 bg-green-500 border border-gray-600 hover:bg-green-700 transition-all cursor-pointer">
                            Dashboard</div>
                        <div class="bg-green-500 rounded-md p-2 hover:bg-yellow-500 transition-all cursor-pointer"><span
                                class="hidden md:block">Offerte di lavoro</span></div>
                    </div>
                </div>
                <main class="w-50 p-12 text-white">
                    <slot />

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
                    error. Ullam sapiente suscipit officia commodi libero.
                </main>
            </div>
        </div>
    </div>
</template>
