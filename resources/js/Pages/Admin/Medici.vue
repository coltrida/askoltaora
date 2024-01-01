<template>
    <Head title="Medici" />
    <v-container>
        <div class="d-flex justify-space-between">
            <div class="text-h4">Medici</div>
            <div style="width: 30%">
                <v-text-field v-model="search" label="Find"></v-text-field>
            </div>
        </div>

        <v-form @submit.prevent="form.post('/admin/medici', {
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
                        <v-text-field
                            v-model="form.citta"
                            label="città"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="2"
                    >
                        <v-select
                            required
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
                    Città
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
                v-for="item in medici.data"
                :key="item.id"
            >
                <td>{{ item.nome }}</td>
                <td>{{ item.citta }}</td>
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
                        v-for="link in medici.links"
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
    citta: null,
    filiale_id: null,
})

let props = defineProps({
    medici: {type: Object},
    filters: {type: Object},
});

const page = usePage()
const filiali = computed(() => page.props.filiali)

let search = ref(props.filters.search);

watch(search, value => {
    router.get('medici', { search: value }, {
        preserveState: true,
        replace: true
    })
})

</script>

<style scoped>

</style>
