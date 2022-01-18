<template>
  <v-card
    height="900"
    width="256"
    class="mx-auto"
  >
    <v-navigation-drawer permanent>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">
            Dashboard
          </v-list-item-title>
          <!-- <v-list-item-subtitle>
            
          </v-list-item-subtitle> -->
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
      <!-- Profile -->
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-information-outline</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title><a href="/dashboard/profile">Profile</a></v-list-item-title>
          </v-list-item-content>
          <!-- Personal Shop -->
        </v-list-item>
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title><a href="/dashboard/personal-shop">Personal Shop</a></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!--  -->
        <!-- Personal Shop -->
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-cart</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title><a href="/dashboard/panier">Panier</a></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!--  -->
        <!--  Commandes -->
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-data-matrix-scan</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title><a href="/dashboard/commandes">Commandes</a></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!--  -->
        <!--  Commandes -->
        <v-list-item>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title><a href="/dashboard/allShops">All Shops</a></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!--  -->
      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
  export default {
    name:"side-bar-component",
    data () {
      return {
        items: [
            // { title: 'Dashboard', icon: 'mdi-view-dashboard' },
        
          
          
          { title: 'All shop', icon: 'mdi-image',link:"/dashboard/all_sop" },
        ],
        right: null,
      }
    },
  }
</script>