<template>
    <Head title="Canali" />
    <v-container>
        <div class="text-h4">Canali Mkt</div>

        <v-form @submit.prevent="form.post('/admin/canali', {
            onSuccess: () => form.reset(),
        })">
            <v-container>
                <v-row>
                    <v-col
                        cols="12"
                        md="3"
                    >
                        <v-text-field
                            v-model="form.primario"
                            label="Canale Mkt"
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
                <th class="text-left">
                    Canale Primario
                </th>
                <th>
                    Canale Secondario
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in canali"
                :key="item.id"
            >
                <td>{{ item.primario }}</td>
                <td>{{ item.secondario }}</td>
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
    canali: {
        type: Array,
    }
});

const form = useForm({
    primario: null,
})

</script>

<style scoped>

</style>
