<template>
    <Head title="Filiali" />
    <v-container>
        <h2>Filiali</h2>

        <v-form @submit.prevent="form.post('/admin/filiali', {
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
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in filiali"
                :key="item.id"
            >
                <td>{{ item.nome }}</td>
                <td>{{ item.indirizzo }}</td>
                <td>{{ item.citta }}</td>
                <td>{{ item.provincia }}</td>
                <td>{{ item.cap }}</td>
                <td>{{ item.telefono }}</td>
                <td>

                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import {computed} from 'vue'
import {usePage} from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    nome: null,
    indirizzo: null,
    citta: null,
    provincia: null,
    cap: null,
    telefono: null,
})

const page = usePage()
const filiali = computed(() => page.props.filiali)
</script>

<style scoped>

</style>
