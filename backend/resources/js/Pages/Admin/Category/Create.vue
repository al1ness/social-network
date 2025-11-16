<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.categories.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="category.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storeCategory" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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
            category: {
                title: ''
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storeCategory(){
            axios.post(route('admin.categories.store'), this.category)
                .then( (res) => {
                    this.category = {
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
