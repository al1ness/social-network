<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.messages.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <textarea v-model="message.body" class="border border-gray-200 p-4 w-full" placeholder="body"/>
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeMessage" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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
            message: {
                body: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeMessage(){
            axios.post(route('admin.messages.store'), this.message)
                .then( (res) => {
                    this.message = {
                        body: ''
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
