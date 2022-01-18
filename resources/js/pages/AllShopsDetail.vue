<template>
    <div>
        <v-row no-gutters>
            <v-col v-for="(item, i) in produits" :key="i" cols="12" sm="4">
                <!-- si on est dans le magasin de la personne et qu'on est au premier tours de la boucle(ceci évitera qu'on ecrive votre magasin pour chaque article)-->
                <p
                    class="text"
                    v-if="item.magasin_id == conecteduser && i == 0"
                >
                    Votre Magasin
                </p>
                <!-- Evite le decalage des articles quand on est aux autres tours de la boucle -->
                <p v-else> .</p>
                <v-card outlined tile class="mx-auto" max-width="344">
                    <v-img
                        :src="`/img/${item.imageProduit}`"
                        height="200px"
                    ></v-img>

                    <v-card-title>
                        {{ item.nomProduit }}
                    </v-card-title>

                    <v-card-subtitle>
                        $ {{ item.prixProduit }}
                    </v-card-subtitle>

                    <v-card-actions>
                        <!-- Form -->
                        <!-- Pour qu'on ne voit pas le bouton ajout si c'est le user connecté qui va dans son shop -->
                        <!-- Le magasin_id est aussi égal au user_id du magasin -->
                        <form
                            v-if="item.magasin_id != conecteduser"
                            :action="`/dashboard/ajoutPanier/produit/${item.id}`"
                            method="post"
                        >
                            <input type="hidden" name="_token" :value="csrf" />
                            <input type="hidden" name="_method" value="POST" />
                            <v-text-field
                                name="quantity"
                                type="number"
                                label="quantité"
                                class="pt-2"
                                min="1"
                            ></v-text-field>
                            <v-btn type="submit" color="orange lighten-2" text>
                                Add to cart
                            </v-btn>
                        </form>
                        <!-- Fin Form -->
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
    </div>
</template>
<script>
export default {
    name: "all-shops-detail",
    props: {
        produits: Array,
        conecteduser: Number,
    },
    data() {
        return {
            right: null,
            cartInfo: {},
            show: false,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
};
</script>
<style scoped>
.text {
    color: red !important;
}
</style>
