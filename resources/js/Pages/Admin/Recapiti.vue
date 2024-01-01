<template>
    <Head title="Recapiti" />
    <v-container>
        <div class="d-flex justify-space-between">
            <div class="text-h4">Recapiti</div>
            <div style="width: 30%">
                <v-text-field v-model="search" label="Find"></v-text-field>
            </div>
        </div>

        <v-form @submit.prevent="form.post('/admin/recapiti', {
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
                        md="3"
                    >
                        <v-text-field
                            v-model="form.indirizzo"
                            label="indirizzo"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.citta"
                            label="città"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="1"
                    >
                        <v-text-field
                            v-model="form.provincia"
                            label="PR"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.cap"
                            label="cap"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.telefono"
                            label="telefono"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-text-field
                            v-model="form.iban"
                            label="iban"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-select
                            label="Filiale"
                            :items=filiali
                            item-title="nome"
                            item-value="id"
                            v-model="form.filiale_id"
                        ></v-select>
                    </v-col>
                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-btn color="primary" type="submit" :disabled="form.processing">Submit</v-btn>
                    </v-col>
                </v-row>

            </v-container>
        </v-form>

        <v-table>
            <thead>
            <tr>
                <th class="text-left">
                    Nome
                </th>
                <th class="text-left">
                    Indirizzo
                </th>
                <th class="text-left">
                    Città
                </th>
                <th class="text-left">
                    Provincia
                </th>
                <th class="text-left">
                    cap
                </th>
                <th class="text-left">
                    Telefono
                </th>
                <th class="text-left">
                    iban
                </th>
                <th class="text-left">
                    Filiale
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in recapiti.data"
                :key="item.id"
            >
                <td>{{ item.nome }}</td>
                <td>{{ item.indirizzo }}</td>
                <td>{{ item.citta }}</td>
                <td>{{ item.provincia }}</td>
                <td>{{ item.cap }}</td>
                <td>{{ item.telefono }}</td>
                <td>{{ item.iban }}</td>
                <td>{{ item.filiale }}</td>
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
                        v-for="link in recapiti.links"
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
import {computed} from 'vue'
import {usePage} from '@inertiajs/vue3'

const form = useForm({
    nome: null,
    indirizzo: null,
    citta: null,
    provincia: null,
    cap: null,
    telefono: null,
    iban: null,
    filiale_id: null,
})

let props = defineProps({
    recapiti: {type: Object},
    filters: {type: Object},
});

const page = usePage()
const filiali = computed(() => page.props.filiali)

let search = ref(props.filters.search);

watch(search, value => {
    router.get('recapiti', { search: value }, {
        preserveState: true,
        replace: true
    })
})

</script>

<style scoped>

</style>
