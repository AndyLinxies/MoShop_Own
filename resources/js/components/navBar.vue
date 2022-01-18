<template>
    <v-card class="overflow-hidden">
        <v-app-bar
            absolute
            color="#6A76AB"
            dark
            shrink-on-scroll
            prominent
            src="https://picsum.photos/1920/1080?random"
            fade-img-on-scroll
            scroll-target="#scrolling-techniques-3"
        >
            <template v-slot:img="{ props }">
                <v-img
                    v-bind="props"
                    gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
                ></v-img>
            </template>

            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-app-bar-title>Moshop</v-app-bar-title>

            <v-spacer></v-spacer>

            <v-btn class="ma-2" color="secondary">
                <a href="/register">Register</a>
            </v-btn>
            <v-btn class="ma-2" color="info">
                <a href="/login">Login to Dashboard</a>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>

            <template v-slot:extension>
                <v-tabs align-with-title>
                    <v-tab>Default Shop</v-tab>
                </v-tabs>
            </template>
        </v-app-bar>
        <v-sheet
            id="scrolling-techniques-3"
            class="overflow-y-auto"
            max-height="900"
        >
            <v-container style="height: 1000px">
                <div class="prods">
                    <div
                        class="grid xl:grid-cols-4 md:grid-cols-2 sm:grid-cols-1"
                    >
                        <div
                            class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 mb-10"
                        >
                            <v-row no-gutters>
                                <v-col
                                    v-for="item in produits"
                                    :key="item.id"
                                    cols="12"
                                    sm="4"
                                >
                                    <v-card
                                        outlined
                                        tile
                                        class="mx-auto"
                                        max-width="344"
                                    >
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
                                            <form
                                                :action="`/dashboard/ajoutPanier/produit/${item.id}`"
                                                method="post"
                                            >
                                                <input
                                                    type="hidden"
                                                    name="_token"
                                                    :value="csrf"
                                                />
                                                <input
                                                    type="hidden"
                                                    name="_method"
                                                    value="POST"
                                                />
                                                <v-text-field
                                                    name="quantity"
                                                    type="number"
                                                    label="quantité"
                                                    class="pt-2"
                                                    min="1"
                                                ></v-text-field>
                                                <v-btn
                                                    type="submit"
                                                    color="orange lighten-2"
                                                    text
                                                >
                                                    Add to cart
                                                </v-btn>
                                            </form>
                                            <!-- Fin Form -->
                                            <v-spacer></v-spacer>

                                            <v-btn icon @click="show = !show">
                                                <v-icon>{{
                                                    show
                                                        ? "mdi-chevron-up"
                                                        : "mdi-chevron-down"
                                                }}</v-icon>
                                            </v-btn>
                                        </v-card-actions>

                                        <v-expand-transition>
                                            <div v-show="show">
                                                <v-divider></v-divider>

                                                <v-card-text>
                                                    {{
                                                        item.descriptionProduit
                                                    }}
                                                </v-card-text>
                                            </div>
                                        </v-expand-transition>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </div>
                    </div>
                </div>
            </v-container>
        </v-sheet>
    </v-card>
</template>
<script>
export default {
    name: "nav-bar-component",
    props: {
        produits: Array,
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
    methods: {
        addToCart() {},
    },
};
</script>
<style>
.prods {
    margin-top: 30%;
}
a {
    text-decoration: none !important;
    color: inherit !important;
}
</style>
