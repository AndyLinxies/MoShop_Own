require('./bootstrap');
//breeze
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//Vue
window.Vue = require('vue');
import Vue from 'vue';

import vuetify from './vuetify';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('nav-bar-component', require('./components/navBar.vue').default);

Vue.component('profile', require('./pages/Profile.vue').default);

Vue.component('side-bar-component', require('./components/sideBar.vue').default);

Vue.component('personal-shop', require('./pages/PersonalShop.vue').default);
Vue.component('panier-component', require('./pages/Panier.vue').default);
Vue.component('commandes-component', require('./pages/Commandes.vue').default);
Vue.component('all-shops-component', require('./pages/AllShops.vue').default);
Vue.component('commande-detail-component', require('./pages/CommandeDetail.vue').default);
Vue.component('all-shops-detail', require('./pages/AllShopsDetail.vue').default);



//Router
// import VueRouter from 'vue-router'
// import Profile from './pages/Profile.vue'

// Vue.use(VueRouter)

// const routes = [
//     {
//       path: '/profile',
//       name: 'Profile',
//       component: Profile
//     }
// ]

// const router = new VueRouter({
//     mode:'history',
//     routes
// })


const app = new Vue({
    el: '#app',
    vuetify,
    // router,
});