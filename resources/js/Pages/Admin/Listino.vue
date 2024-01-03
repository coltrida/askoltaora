<template>
    <Head title="Listino" />
    <v-container>
        <div class="d-flex justify-space-between">
            <div class="text-h4">Listino</div>
            <div style="width: 30%">
                <v-text-field v-model="search" label="Find"></v-text-field>
            </div>
        </div>

        <v-form @submit.prevent="form.post('/admin/listino', {
            onSuccess: () => form.reset(),
        })">
            <v-container>
                <v-row>
                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.nome"
                            label="name"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-select
                            required
                            label="Fornitori"
                            :items=fornitori
                            item-title="nome"
                            item-value="id"
                            v-model="form.fornitore_id"
                        ></v-select>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-select
                            required
                            label="Categoria"
                            :items=categorie
                            item-title="nome"
                            item-value="id"
                            v-model="form.categoria_id"
                        ></v-select>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.costo"
                            label="costo"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.prezzolistino"
                            label="prezzo listino"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.giorniTempoDiReso"
                            label="gg Reso"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-btn color="primary" type="submit" :disabled="form.processing">Submit</v-btn>
            </v-container>
        </v-form>

        <v-table>
            <thead>
            <tr>
                <th class="text-left">
                    Nome
                </th>
                <th class="text-left">
                    fornitore
                </th>
                <th class="text-left">
                    categoria
                </th>
                <th class="text-left">
                    costo
                </th>
                <th class="text-left">
                    prezzolistino
                </th>
                <th class="text-left">
                    giorniTempoDiReso
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in listino.data"
                :key="item.id"
            >
                <td>{{ item.nome }}</td>
                <td>{{ item.fornitore }}</td>
                <td>{{ item.categoria }}</td>
                <td>{{ item.costoFormattato }}</td>
                <td>{{ item.prezzoFormattato }}</td>
                <td>{{ item.giorniTempoDiReso }}</td>
                <td>
                    <v-btn color="red-darken-4">
                        <v-icon
                            icon="mdi-trash-can-outline"
                        ></v-icon>
                    </v-btn>
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    <component
                        v-for="link in listino.links"
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
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    nome: null,
    fornitore_id: null,
    categoria_id: null,
    costo: null,
    prezzolistino: null,
    giorniTempoDiReso: null,
})

let props = defineProps({
    listino: {type: Object},
    fornitori: {type: Object},
    categorie: {type: Object},
    filters: {type: Object},
});

let search = ref(props.filters.search);

watch(search, value => {
    router.get('listino', { search: value }, {
        preserveState: true,
        replace: true
    })
})

</script>

<style scoped>

</style>
