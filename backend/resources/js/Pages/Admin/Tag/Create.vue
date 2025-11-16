<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.tags.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="tag.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeTag" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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
            tag: {
                title: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeTag(){
            axios.post(route('admin.tags.store'), this.tag)
                .then( (res) => {
                    this.tag = {
                        title: ''
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
