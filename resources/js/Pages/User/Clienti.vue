<template>
    <Head title="Clienti" />
    <v-container fluid>
        <div class="d-flex justify-space-between">
            <div class="text-h4">Clienti di {{filiale.nome}}</div>
            <div style="width: 30%">
                <v-text-field v-model="search" label="Find"></v-text-field>
            </div>
        </div>

        <v-table>
            <thead>
            <tr>
                <th style="width: 100px; flex-wrap: nowrap!important;">
                    Action
                </th>
                <th style="width: 150px; flex-wrap: nowrap!important;" class="text-left">
                    Nome
                </th>
                <th style="width: 150px; flex-wrap: nowrap!important;" class="text-left">
                    Indirizzo
                </th>
                <th style="width: 150px; flex-wrap: nowrap!important;" class="text-left">
                    Città
                </th>
                <th style="width: 50px; flex-wrap: nowrap" class="text-left">
                    Provincia
                </th>
                <th style="width: 50px; flex-wrap: nowrap" class="text-left">
                    cap
                </th>
                <th style="width: 150px; flex-wrap: nowrap" class="text-left">
                    Telefono
                </th>
                <th style="width: 150px; flex-wrap: nowrap" class="text-left">
                    Telefono2
                </th>
                <th style="width: 150px; flex-wrap: nowrap" class="text-left">
                    email
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in clienti.data"
                :key="item.id"
            >
                <td>
                    <v-btn
                        density="compact"
                        class="ma-2"
                        variant="text"
                        icon="mdi-pencil"
                        color="primary"
                    ></v-btn>
                    <v-btn
                        density="compact"
                        class="ma-2"
                        variant="text"
                        icon="mdi-alert-circle-outline"
                        color="success"
                    ></v-btn>
                </td>
                <td>{{ item.fullName }}</td>
                <td>{{ item.indirizzo }}</td>
                <td>{{ item.citta }}</td>
                <td>{{ item.provincia }}</td>
                <td>{{ item.cap }}</td>
                <td>{{ item.telefono1 }}</td>
                <td>{{ item.telefono2 }}</td>
                <td>{{ item.email }}</td>
            </tr>
            <tr>
                <td colspan="9">
                    <component
                        v-for="link in clienti.links"
                        class="mx-1 p-2"
                        style="border: gray 1px solid; border-radius: 5px; box-shadow: 2px 2px 5px gray;"
                        :class="{'text-gray-400': !link.url, 'font-bold; bg-green': link.active}"
                    >
                        <Link v-if="link.url" :href="link.url" v-html="link.label" class="px-2"></Link>
                        <span v-else v-html="link.label" class="text-gray-400"></span>
                    </component >
                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script setup>
import { Link, Head, router } from '@inertiajs/vue3';
import {ref, watch} from "vue";
import {computed} from 'vue'

let props = defineProps({
    clienti: {type: Object},
    filiale: {type: Object},
    filters: {type: Object},
});

let search = ref(props.filters.search);
let rotta = computed(() => '/admin/clienti/'+props.filiale.id)

watch(search, value => {
    router.get(rotta.value, { search: value }, {
        preserveState: true,
        replace: true
    })
})

</script>

<style scoped>
v-table {
    overflow-x: auto;
}
</style>
