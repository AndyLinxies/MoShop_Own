<template>
    <!-- New -->
    <v-row justify="space-around">
        <v-col cols="auto">
            <v-dialog transition="dialog-bottom-transition" max-width="600">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        class="ajoutBtn"
                        color="primary"
                        v-bind="attrs"
                        v-on="on"
                        >Edit User Informations</v-btn
                    >
                </template>
                <template v-slot:default="dialog">
                    <v-card>
                        <v-toolbar color="primary" dark
                            >Modification des informations</v-toolbar
                        >
                        <v-card-text>
                            <!-- <div class="text-h2 pa-12">Hello world!</div> -->

                            <!-- Formulaire d'ajout -->
                            <form
                                :action="`/dashboard/profile/${profile.id}/update`"
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
                                    value="PUT"
                                />
                                

                                <v-text-field
                                    name="firstName"
                                    label="First Name"
                                />
                                <v-text-field
                                    name="lastName"
                                    label="Last Name"
                                ></v-text-field>
                                <v-text-field
                                    name="email"
                                    label="Email"
                                ></v-text-field>
                                <v-text-field
                                    name="picture"
                                    type="file"
                                    label="Image de profil"
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
    <!-- fin New -->
</template>
<script>
export default {
    name: "UserEditModal",
    props: {
        // showEditModal: Boolean,
        profile: Object,
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        };
    },
};
</script>
<style></style>

<!-- <div>
        <div
            class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
            <div class="relative w-auto my-6 mx-auto max-w-6xl">
                content -->
<!-- <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                >
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t"
                    >
                        <h3 class="text-3xl font-semibold">
                            Edit User Informations
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                        > -->
<!-- <span
                                class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
                            >
                                ×
                            </span>
                        </button>
                    </div> -->
<!--body-->
<!-- <div class="relative p-6 flex-auto">
                        <form
                            :action="`/dashboard/profile/${profile.id}/update`"
                            enctype="multipart/form-data"
                            method="post"
                        >
                            <v-text-field
                                type="hidden"
                                name="_token"
                                :value="csrf"
                            ></v-text-field>
                            <v-text-field
                                type="hidden"
                                name="_method"
                                value="PUT"
                            ></v-text-field>
                            <div
                                class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2"
                            >
                                <div>
                                    <label
                                        class="text-gray-700 dark:text-gray-200"
                                        for="emailAddress"
                                        >First name</label
                                    > -->
<!-- <v-text-field
                                        name="firstName"
                                        type="text"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="text-gray-700 dark:text-gray-200"
                                        for="emailAddress"
                                        >Last name</label
                                    > -->
<!-- <v-text-field
                                        name="lastName"
                                        type="text"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    />
                                </div> -->
<!-- <div>
                                    <label
                                        class="text-gray-700 dark:text-gray-200"
                                        for="emailAddress"
                                        >Email</label
                                    >
                                    <v-text-field
                                        name="email"
                                        type="text"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    />
                                </div>
                            </div> -->

<!-- <div class="border border-t-1">
                                <label class="text-gray-700 dark:text-gray-200"
                                    >Picture</label
                                >
                                <input
                                name="picture"
                                    ref="file"
                                    type="file"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                /> -->
<!-- <button
                                    class="border mt-2 border-solid rounded border-blue-500 background-transparent font-bold uppercase px-6 py-2 text-sm text-blue-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="submit"
                                    
                                >
                                    Save Changes
                                </button>
                            </div> -->
<!-- 
                            <div
                                class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b"
                            >
                                <button
                                    class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"
                                    v-on:click="$emit('modalValue')"
                                >
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--footer-->
<!-- </div>
            </div>
        </div>
        <div class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>  -->
