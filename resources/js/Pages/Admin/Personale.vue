<template>
    <Head title="Personale" />
    <v-container>
        <div class="text-h4">Personale</div>

        <v-form @submit.prevent="form.post('/admin/personale', {
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
                            v-model="form.email"
                            label="email"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-select
                            required
                            label="ruolo"
                            :items=ruoli
                            item-title="nome"
                            item-value="id"
                            v-model="form.ruolo_id"
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
                    ruolo
                </th>
                <th class="text-left">
                    email
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in personale"
                :key="item.id"
            >
                <td>{{ item.nome }}</td>
                <td>{{ item.ruolo }}</td>
                <td>{{ item.email }}</td>
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

const form = useForm({
    nome: null,
    ruolo_id: null,
    email: null,
})

defineProps({
    personale: {type: Object},
    ruoli: {type: Object},
});
</script>

<style scoped>

</style>
