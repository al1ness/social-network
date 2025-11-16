<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.images.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="image.file_path" class="border border-gray-200 p-4 w-full" type="text" placeholder="File path">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeImage" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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
            image: {
                file_path: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeImage(){
            axios.post(route('admin.images.store'), this.image)
                .then( (res) => {
                    this.image = {
                        file_path: ''
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
