<template>
    <div>
        <v-toolbar
            dark
            prominent
            color="primary"
        >
            <v-app-bar-nav-icon class="d-flex d-sm-none"></v-app-bar-nav-icon>

            <v-toolbar-title>{{ nomeAzienda }}</v-toolbar-title>

            <span v-if="user">
                <span v-if="user.ruolo.nome === 'Admin'">
                    <Link :href="route('admin.home')">
                    <v-btn :variant="$page.component === 'Admin/Home' ? 'tonal' : 'text'">
                        Home
                    </v-btn>
                </Link>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Clients
                            </v-btn>
                        </template>
                        <v-list>
                            <Link
                                v-for="(item, index) in filiali"
                                :key="index"
                                :href="route('user.clienti', item.id)"
                            >
                                <v-list-item>
                                    <v-list-item-title>
                                        {{item.nome}}
                                    </v-list-item-title>
                                </v-list-item>
                            </Link>
                            <v-list-item>
                                <v-list-item-title>
                                    TUTTE
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Filiali
                            </v-btn>
                        </template>
                        <v-list>
                            <Link :href="route('admin.filiali')">
                                <v-list-item>
                                    <v-list-item-title>
                                        lista
                                    </v-list-item-title>
                                </v-list-item>
                            </Link>
                            <Link :href="route('admin.recapiti')">
                                <v-list-item>
                                    <v-list-item-title>
                                        Recapiti
                                    </v-list-item-title>
                                </v-list-item>
                            </Link>
                            <Link :href="route('admin.medici')">
                            <v-list-item>
                                <v-list-item-title>
                                    Medici
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Personale
                            </v-btn>
                        </template>
                        <v-list>
                            <Link :href="route('admin.personale')">
                            <v-list-item>
                                <v-list-item-title>
                                    Lista
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                            <Link :href="route('admin.associa')">
                            <v-list-item>
                                <v-list-item-title>
                                    Associa
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Fornitori
                            </v-btn>
                        </template>
                        <v-list>
                            <Link :href="route('admin.fornitori')">
                                <v-list-item>
                                    <v-list-item-title>
                                        Lista
                                    </v-list-item-title>
                                </v-list-item>
                            </Link>
                            <v-list-item>
                                <v-list-item-title>
                                    Prodotti
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Magazzini
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-list-item-title>
                                    Civitanova
                                </v-list-item-title>
                            </v-list-item>
                            <v-list-item>
                                <v-list-item-title>
                                    Fabriano
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Prove
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-list-item-title>
                                    Lista
                                </v-list-item-title>
                            </v-list-item>
                            <v-list-item>
                                <v-list-item-title>
                                    Fatture
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Settings
                            </v-btn>
                        </template>
                        <v-list>
                            <Link :href="route('admin.ruoli')">
                                <v-list-item>
                                    <v-list-item-title>
                                        Ruoli
                                    </v-list-item-title>
                                </v-list-item>
                            </Link>
                            <Link :href="route('admin.statoApa')">
                            <v-list-item>
                                <v-list-item-title>
                                    StatoApa
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                            <Link :href="route('admin.categorie')">
                            <v-list-item>
                                <v-list-item-title>
                                    Categorie
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                            <Link :href="route('admin.tipologie')">
                            <v-list-item>
                                <v-list-item-title>
                                    Tipologie
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                            <Link :href="route('admin.canali')">
                            <v-list-item>
                                <v-list-item-title>
                                    Canali
                                </v-list-item-title>
                            </v-list-item>
                            </Link>
                        </v-list>
                    </v-menu>

                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn :variant="$page.component === 'Admin/Tags' ? 'tonal' : 'text'"  v-bind="props">
                                Statistiche
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-list-item-title>
                                    Fatturati
                                </v-list-item-title>
                            </v-list-item>
                            <v-list-item>
                                <v-list-item-title>
                                    Canali
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </span>
            </span>
            <v-spacer></v-spacer>

            <v-menu
                v-if="user"
                transition="slide-y-transition"
            >
                <template v-slot:activator="{ props }">
                    <v-btn icon v-bind="props">
                        <v-avatar>
                            <v-img
                                src="https://cdn.vuetifyjs.com/images/john.jpg"
                                alt="John"
                            ></v-img>
                        </v-avatar>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item>
                        <v-list-item-title>
                            {{user.nome}}
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-title>
                            <Link
                                :href="route('logout')" method="post" as="button"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Logout
                            </Link>

                        </v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar>
        <slot/>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import {computed} from 'vue'
import {usePage} from '@inertiajs/vue3'

const page = usePage()

const user = computed(() => page.props.user);
const nomeAzienda = computed(() => page.props.nomeAzienda)
const filiali = computed(() => page.props.filiali)
</script>

<style scoped>

</style>
