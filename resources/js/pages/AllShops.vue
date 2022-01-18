<template>
    <div class="bg-red-500 w-full">
        <p>All-shops</p>

        <template>
            <v-card v-for="magasin in magasins" :key="magasin.id" class="mx-auto" max-width="344" outlined>
                <v-list-item three-line>
                    <v-list-item-content>
                        <div class="text-overline mb-4">
                              <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full dark:border-blue-400" alt="Testimonial avatar" :src="`/img/${magasin.picture}`">

                        </div>
                        <v-list-item-title class="text-h5 mb-1">
                            {{magasin.nomMagasin}} 
                        </v-list-item-title> 
                        <!-- <v-list-item-subtitle
                            >Greyhound divisely hello coldly
                            fonwderfully</v-list-item-subtitle
                        >  -->
                    </v-list-item-content>

                    <v-list-item-avatar
                        tile
                        size="80"
                        color="grey"
                    ></v-list-item-avatar>
                </v-list-item>

                <v-card-actions>
                    <v-btn outlined rounded text> <a :href="`/dashboard/allShopsDetail/${magasin.id}`">Details </a> </v-btn>
                </v-card-actions>
            </v-card>
        </template>
    </div>
</template>

<script>
export default {
    name: "all-shops-component",
    props: {
        magasins: Array,
    },
};
</script>

<style></style>
