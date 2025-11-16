<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.videos.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="video.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="Title">
                </div>
                <div class="mb-4">
                    <input v-model="video.file_path" class="border border-gray-200 p-4 w-full" type="text" placeholder="File path">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeVideo" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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
            video: {
                title: '',
                file_path: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeVideo(){
            axios.post(route('admin.videos.store'), this.video)
                .then( (res) => {
                    this.video = {
                        title: '',
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
