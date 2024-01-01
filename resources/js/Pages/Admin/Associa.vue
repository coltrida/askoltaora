<template>
    <Head title="Associa" />
    <v-container>
        <v-form @submit.prevent="form.post('/admin/associa', {
            onSuccess: () => form.reset(),
        })">
        <div class="text-h4">Associa</div>

        <v-row class="mt-4">
            <v-col
                cols="12"
                md="3"
            >
                <v-list>
                    <v-list-subheader>PERSONALE</v-list-subheader>
                    <v-radio-group v-model="form.idUser">
                        <v-radio
                            v-for="(item, i) in personaleNonAssociato"
                            :key="i"
                            :label=item.nome
                            :value=item.id
                        />
                    </v-radio-group>
                </v-list>
            </v-col>

            <v-col
                cols="12"
                md="3"
            >
                <v-list>
                    <v-list-subheader>
                        <div class="d-flex align-center">
                            FILIALI
                            <v-checkbox
                                density="compact"
                                hide-details
                                @click="selectTutti"
                            />
                        </div>

                    </v-list-subheader>

                    <v-checkbox
                        density="compact"
                        hide-details
                        v-for="(item, i) in listaFiliali"
                        :key="i"
                        :label=item.nome
                        :value=item.id
                        v-model="form.filiali"
                    />
                </v-list>
            </v-col>

            <v-col
                cols="12"
                md="4"
            >
                Associazioni
                <v-card
                    border
                    class="mb-3"
                    v-for="(filiale, i) in associazioni"
                    :key="i"
                >
                    <v-card-title> {{filiale.nome}}</v-card-title>
                    <v-list>
                        <v-list-item
                            v-for="(personale, i) in filiale.users"
                            :key="i"
                            :title="personale.nome"
                        >
                            <template v-slot:append>
                                <v-btn
                                    @click="eliminaAssociazione(filiale.id, personale.id)"
                                    color="red-darken-4"
                                    icon="mdi-trash-can-outline"
                                    variant="text"
                                ></v-btn>
                            </template>
                        </v-list-item>
                    </v-list>
                </v-card>
            </v-col>

            <v-col
                cols="12"
                md="2"
            >
                <v-btn color="indigo-darken-1" type="submit" :disabled="form.processing">
                    Associa
                </v-btn>
            </v-col>
        </v-row>
        </v-form>
    </v-container>
</template>

<script setup>
import {Head, useForm, router, usePage} from '@inertiajs/vue3';
import {computed} from "vue";

const form = useForm({
    idUser: null,
    filiali:[]
})

defineProps({
    personaleNonAssociato: {type: Object},
    associazioni: {type: Object},
});

const page = usePage()
const listaFiliali = computed(() => page.props.filiali)

const eliminaAssociazione = (idFiliale, idUser) => {
    router.delete('deAssocia/'+idFiliale+'/'+idUser, {
        preserveState: true,
        replace: true
    })
};

let tutteFilialiSelezionate = false;

const selectTutti = () => {
    tutteFilialiSelezionate = !tutteFilialiSelezionate
    if (tutteFilialiSelezionate){
        listaFiliali.value.forEach((element) => {
            form.filiali.push(element.id)
        });
    } else {
        form.filiali = []
    }
}
</script>

<style scoped>

</style>
