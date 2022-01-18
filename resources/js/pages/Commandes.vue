<template>
    <div class="bg-red-500 w-full">
        <p>Vos Commandes</p>

        <v-card
            v-for="commande in commandes"
            :key="commande.id"
            elevation="3"
            outlined
            shaped
        >
        <img class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400" alt="Testimonial avatar" src="/img/cart.jpg">

            <v-card-title>
                {{ commande.date }}
            </v-card-title>

            <v-card-text>
               Total price: $ {{ commande.totalPrice }} 
            </v-card-text>
            <v-card-actions>
      <v-btn
        outlined
        rounded
        text
      ><a :href="`/dashboard/commandeDetail/${commande.id}`"> Details</a>
       
      </v-btn>
    </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "commandes-component",
    props: {
        commandes: Array,
    },
};
</script>

<style></style>
