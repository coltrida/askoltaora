<template>
    <Head title="StatoApa" />
    <v-container>
        <div class="text-h4">Stato Apa</div>

        <v-form @submit.prevent="form.post('/admin/statoApa', {
            onSuccess: () => form.reset(),
        })">
            <v-container>
                <v-row>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="form.nome"
                            label="nome stato"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="5"
                    >
                        <v-text-field
                            v-model="form.descrizione"
                            label="descrizione"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col>
                        <v-btn color="primary" type="submit" :disabled="form.processing">Submit</v-btn>
                    </v-col>
                </v-row>

            </v-container>
        </v-form>

        <v-table>
            <thead>
            <tr>
                <th>
                    Id
                </th>
                <th class="text-left">
                    Nome
                </th>
                <th class="text-left">
                    Descrizione
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in statoApa"
                :key="item.id"
            >
                <td>{{item.id}}</td>
                <td>{{ item.nome }}</td>
                <td>{{ item.descrizione }}</td>
                <td>
                    <v-btn color="red-darken-4">
                        <v-icon
                            icon="mdi-trash-can-outline"
                        ></v-icon>
                    </v-btn>
                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

defineProps({
    statoApa: {
        type: Array,
    }
});

const form = useForm({
    nome: null,
    descrizione: null,
})

</script>

<style scoped>

</style>
