<template>
    <Head title="Pazienti" />
    <v-container>
        <div class="d-flex justify-space-between">
            <div class="text-h4">Pazienti</div>
        </div>

        <v-table class="mt-3">
            <thead class="bg-green-darken-1">
            <tr>
                <th>
                    Filiale
                </th>
                <th class="text-left"
                    v-for="tipologia in tipologie"
                    :key="tipologia.id"
                >
                    {{tipologia.nome}}
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="item in filialiConTipologiePazienti"
                :key="item.id"
            >
                <td>
                    {{item.nome}}
                </td>
                <td>
                    {{item.LEAD}}
                </td>
                <td>
                    {{item.CL}}
                </td>
                <td>
                    {{item.PC}}
                </td>
                <td>
                    {{item.CLC}}
                </td>
                <td>
                    {{item.PREM}}
                </td>
                <td>
                    {{item.DEC}}
                </td>
                <td>
                    {{item.TAPPO}}
                </td>
                <td>
                    {{item.NORMO}}
                </td>
                <td>
                    <Link :href="route('user.clienti', item.id)">
                        <v-btn color="primary">
                            <v-icon
                                icon="mdi-eye"
                            ></v-icon>
                        </v-btn>
                    </Link>
                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script setup>
import {Link, Head, usePage} from '@inertiajs/vue3';
import {computed} from "vue";

let props = defineProps({
    tipologie: {type: Object},
    filialiConTipologiePazienti: {type: Object},
});

const page = usePage()
const filiali = computed(() => page.props.filiali)

</script>

<style scoped>

</style>
