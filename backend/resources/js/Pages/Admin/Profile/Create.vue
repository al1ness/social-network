<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.profiles.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="profile.name" class="border border-gray-200 p-4 w-full" type="text" placeholder="name">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeProfile" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";
import axios from 'axios';

export default {
    name: "Create",

    layout: AdminLayout,

    data() {
        return {
            profile: {
                name: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeProfile(){
            axios.post(route('admin.profiles.store'), this.profile)
                .then( (res) => {
                    this.profile = {
                        name: ''
                    }
                })
        }
    }
}
</script>

<style scoped>

</style>
<script setup lang="ts">
</script>
