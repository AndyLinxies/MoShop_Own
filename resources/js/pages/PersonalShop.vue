<template>
    <div>
        <p>Votre Shop Personnel</p>
        <!-- Ajout de produit -->
        <div data-app>
            <CreateProductModal
                :title="create.title"
                :action="create.action"
                :value="create.value"
            />
        </div>
        <!--  -->
        <v-container style="height: 1000px">
            <div>
                <v-row no-gutters>
                    <v-col
                        v-for="item in personalshop"
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
                                $ {{ item.prixProduit }}
                            </v-card-subtitle>

                            <v-card-actions>
                                <v-spacer></v-spacer>

                                <v-btn icon @click="show = !show">
                                    <v-icon>{{
                                        show
                                            ? "mdi-chevron-up"
                                            : "mdi-chevron-down"
                                    }}</v-icon>
                                </v-btn>

                                <!-- Delete product -->
                                <form
                                    :action="`/dashboard/produit/${item.id}/delete`"
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
                                        value="DELETE"
                                    />
                                    <button type="submit">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-red-500 ml-2 sup"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>
                                </form>
                                <!-- Fin delete -->
                            </v-card-actions>
                                <div data-app>
                                    <CreateProductModal
                                        :title="update.title"
                                        :action="update.action"
                                        :value="update.value"
                                        :id="item.id"
                                    />
                                </div>

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
        </v-container>
    </div>
</template>

<script>
import CreateProductModal from "../components/CreateProductModal.vue";

export default {
    name: "personal-shop",
    props: {
        personalshop: Array,
    },
    components: {
        CreateProductModal,
    },
    data() {
        return {
            show: false,
            productId: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            create: {
                title: "Ajout de Produit",
                action: "/dashboard/produit/create",
                value: "POST",
            },
            //le id sera passé dans la boucle
            update: {
                title: "Modification de Produit",
                action: "/dashboard/produit/update/",
                value: "PUT",
            },
        };
    },
};
</script>

<style>
.sup {
    color: red !important;
}
</style>
