<template>
    <div class="bg-red-500 w-full">
        <p>You are in the profile</p>
        <!--  -->
        <!-- @modalValue="showEditModal=false" -->
        <!-- :showEditModal="showEditModal" v-if="showEditModal"  -->

        <div class="cardUser">
            <div
                class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800"
            >
                <img
                    class="object-cover"
                    :src="`/img/${profile.picture}`"
                    alt="avatar"
                />

                <div class="py-5 text-center">
                    <a
                        href="#"
                        class="block text-2xl font-bold text-gray-800 dark:text-white"
                        >Full name: {{ profile.firstName }}
                        {{ profile.lastName }}</a
                    >
                    <p class="text-sm text-gray-700 dark:text-gray-200">
                        Email: {{ profile.email }}
                    </p>
                    <!-- <v-btn @click="showEditModal = true" elevation="2"
                        >Edit</v-btn
                    > -->
                    <div data-app>
                        <UserEditModal :profile="profile" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserEditModal from "../components/UserEditModal.vue";

export default {
    name: "profile",
    props: {
        profile: Object,
    },
    components: {
        UserEditModal,
    },
    data() {
        return {
            showEditModal: false,
        };
    },
};
</script>

<style></style>
