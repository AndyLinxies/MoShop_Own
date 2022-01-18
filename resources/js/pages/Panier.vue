<template>
    <div class="bg-red-500 w-full">
        <!-- <p>You are in the Panier</p> -->
        <p>
            Vous avez ajouté {{ product_of_panier.length }} produit(s) à votre
            Panier
        </p>
        <!--  -->
        <v-container style="height: 1000px">
            <v-row no-gutters>
                <v-col
                    v-for="item in product_of_panier"
                    :key="item.id"
                    cols="12"
                    sm="4"
                >
                    <v-card outlined tile class="mx-auto" max-width="344">
                        <v-img
                            :src="`/img/${item.imageProduit}`"
                            height="200px"
                        ></v-img>

                        <v-card-title>
                            {{ item.nomProduit }}
                        </v-card-title>

                        <v-card-subtitle>
                            $ {{ item.prixProduit }} quantity:
                            {{ item.quantity }}
                        </v-card-subtitle>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn icon @click="show = !show">
                                <v-icon>{{
                                    show ? "mdi-chevron-up" : "mdi-chevron-down"
                                }}</v-icon>
                            </v-btn>
                        </v-card-actions>

                        <v-expand-transition>
                            <div v-show="show">
                                <v-divider></v-divider>

                                <v-card-text>
                                    {{ item.descriptionProduit }}
                                </v-card-text>
                            </div>
                        </v-expand-transition>
                    </v-card>
                </v-col>
            </v-row>

            <!-- Ajout d'une commande -->
            <form action="/dashboard/ajoutCommande" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="_method" value="POST" />

                <v-btn type="submit" class="validate" color="primary">
                    Valider la commande
                </v-btn>
            </form>

            <!--Fin Ajout d'une commande  -->
        </v-container>
    </div>
</template>

<script>
export default {
    name: "panier-component",
    props: {
        product_of_panier: Array,
    },
    data() {
        return {
            show: false,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
};
</script>

<style scoped>
.validate {
    margin-top: 3%;
    background-color: green !important;
}
</style>
