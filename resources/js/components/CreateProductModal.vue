<template>
    <v-row justify="space-around">
        <v-col cols="auto">
            <v-dialog transition="dialog-bottom-transition" max-width="600">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        class="ajoutBtn"
                        color="primary"
                        v-bind="attrs"
                        v-on="on"
                        >{{id ? "Edit": title}}</v-btn
                    >
                </template>
                <template v-slot:default="dialog">
                    <v-card>
                        <v-toolbar color="primary" dark
                            >{{title}}</v-toolbar
                        >
                        <v-card-text>
                            <!-- <div class="text-h2 pa-12">Hello world!</div> -->

                            <!-- Formulaire d'ajout -->
                            <form
                                :action="getAction"
                                enctype="multipart/form-data"
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
                                    :value="value"
                                />

                                <v-text-field
                                    name="nomProduit"
                                    label="Nom du Produit"
                                    class="pt-2"
                                />
                                <v-text-field
                                    class="pt-2"
                                    name="descriptionProduit"
                                    label="Description du Produit"
                                ></v-text-field>
                                <v-text-field
                                    name="imageProduit"
                                    type="file"
                                    label="Image du Produit"
                                    class="pt-2"
                                ></v-text-field>
                                <v-text-field
                                    name="prixProduit"
                                    type="number"
                                    min="1"
                                    label="Prix du Produit"
                                    class="pt-2"
                                ></v-text-field>

                                <v-btn type="submit">Save</v-btn>
                            </form>
                            <!--  -->
                        </v-card-text>
                        <v-card-actions class="justify-end">
                            <v-btn text @click="dialog.value = false"
                                >Close</v-btn
                            >
                        </v-card-actions>
                    </v-card>
                </template>
            </v-dialog>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: "CreateProductModal",
    props:{
        title: String,
        action: String,
        value: String,
        id: Number
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
    computed: {
        getAction(){
            return this.id ? this.action+this.id : this.action
        }
    },
};
</script>

<style>
.ajoutBtn {
    background-color: green !important;
}

</style>
