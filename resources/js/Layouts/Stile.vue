<template>
    <div>
        <v-toolbar
            dark
            prominent
            color="primary"
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>Vuetify</v-toolbar-title>

            <v-spacer></v-spacer>
            <v-menu
                v-if="userName"
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
                            <Link
                                :href="route('logout')" method="post"
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
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const userName = computed(() => page.props.user)
</script>

<style scoped>

</style>
