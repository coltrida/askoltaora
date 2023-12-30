<template>
    <Head title="Configuration" />
<h2>Configuration</h2>

        <v-form fast-fail @submit.prevent="saveConfig">
            <v-container>
                <v-row>
                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="nomeAzienda"
                            label="Nome Azienda"
                            :rules="nomeAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="indirizzoAzienda"
                            label="Indirizzo Azienda"
                            :rules="indirizzoAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="cittaAzienda"
                            label="Città Azienda"
                            :rules="cittaAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="provinciaAzienda"
                            label="Provincia Azienda"
                            :rules="provinciaAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="capAzienda"
                            label="CAP Azienda"
                            :rules="capAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="pivaAzienda"
                            label="Partita iva"
                            :rules="pivaAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="emailAzienda"
                            label="email Azienda"
                            :rules="emailAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="pecAzienda"
                            label="PEC Azienda"
                            :rules="pecAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="4"
                    >
                        <v-text-field
                            v-model="telefonoAzienda"
                            label="Telefono Azienda"
                            :rules="telefonoAziendaRules"
                            required
                        ></v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <v-switch
                            v-model="magazzinoCentralizzato"
                            color="primary"
                            label="Magazzino Centralizzato"
                        ></v-switch>
                    </v-col>
                    <v-col>
                        <v-file-input
                            v-model="logo"
                            accept="image/*"
                            show-size
                            label="Logo Aziendale">
                        </v-file-input>
                    </v-col>
                </v-row>

                <v-btn
                    type="submit"
                    class="mt-2"
                    color="primary"
                >
                    Submit
                </v-btn>

            </v-container>
        </v-form>

</template>

<script>
import { router } from '@inertiajs/vue3'
export default {
    data: () => ({
        nomeAzienda: '',
        nomeAziendaRules: [
            value => {
                if (value?.length > 3) return true
                return 'Il nome azienda deve essere almento di 3 caratteri'
            },
        ],
        indirizzoAzienda: '',
        indirizzoAziendaRules: [
            value => {
                if (value?.length > 3) return true
                return 'Il campo indirizzo deve essere almento di 3 caratteri'
            },
        ],
        cittaAzienda: '',
        cittaAziendaRules: [
            value => {
                if (value?.length > 3) return true
                return 'Il campo città deve essere almento di 3 caratteri'
            },
        ],
        provinciaAzienda: '',
        provinciaAziendaRules: [
            value => {
                if (value?.length > 0 && /[^0-9]/.test(value)) return true
                return 'Il campo provincia è obbligatorio ed alfabetico'
            },
        ],
        capAzienda: '',
        capAziendaRules: [
            value => {
                if (value?.length > 0 && /[0-9]/.test(value)) return true
                return 'Il cap è obbligatorio e deve essere numerico'
            }
        ],
        pivaAzienda: '',
        pivaAziendaRules: [
            value => {
                if (value?.length > 0 && /[0-9]/.test(value)) return true
                return 'La partita iva è obbligatoria e deve essere numerica'
            },
        ],
        emailAzienda: '',
        emailAziendaRules: [
            value => {
                if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true
                return 'La mail deve essere valida'
            },
        ],
        pecAzienda: '',
        pecAziendaRules: [
            value => {
                if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true
                return 'La pec deve essere valida'
            },
        ],
        telefonoAzienda: '',
        telefonoAziendaRules: [
            value => {
                if (value?.length > 3) return true
                return 'Il campo telefono deve essere almento di 3 caratteri'
            },
        ],
        magazzinoCentralizzato: true,
        logo:[]
    }),
    methods:{
        saveConfig(){
            router.post('/configuration', {
                nomeAzienda: this.nomeAzienda,
                indirizzoAzienda: this.indirizzoAzienda,
                cittaAzienda: this.cittaAzienda,
                provinciaAzienda: this.provinciaAzienda,
                capAzienda: this.capAzienda,
                pivaAzienda: this.pivaAzienda,
                emailAzienda: this.emailAzienda,
                pecAzienda: this.pecAzienda,
                telefonoAzienda: this.telefonoAzienda,
                magazzinoCentralizzato: this.magazzinoCentralizzato,
                logo: this.logo,
                eseguitaConfigurazione: 1,
            })
        }
    }
}
</script>

<style scoped>

</style>
