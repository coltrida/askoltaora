<template>
    <div>
        <v-toolbar
            dark
            prominent
            color="primary"
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>Vuetify</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-menu>
                <template v-slot:activator="{ props }">
                    <v-btn icon v-bind="props">
                        <v-avatar>
                            <v-img
                                src="https://cdn.vuetifyjs.com/images/john.jpg"
                                alt="John"
                            ></v-img>
                        </v-avatar>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item>
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar>
        <slot/>
    </div>
</template>

<script>
export default {
    name: "Stile"
}
</script>

<style scoped>

</style>
