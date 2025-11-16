<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.posts.index')">BACK </Link>
            </div>
            <div>
                <div class="mb-4">
                    <input v-model="entries.post.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
                </div>
                <div class="mb-4">
                    <textarea v-model="entries.post.body" class="border border-gray-200 p-4 w-full" placeholder="body"></textarea>
                </div>
                <div class="mb-4">
                    <select class="border border-gray-200 p-4 w-full" v-model="entries.post.category_id">
                        <option value="null" selected disabled>Выберите категорию</option>
                        <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                    </select>
                </div>
                <div class="mb-4">
                    <input multiple ref="image_input" @change="setImage" class="border border-gray-200 p-4 w-full" type="file">
                </div>
                <div class="mb-4">
                    <input v-model="entries.tags" class="border border-gray-200 p-4 w-full" type="text" placeholder="tags">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="storePost" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">STORE</a>
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

    props: {
        categories: Array
    },

    data() {
        return {
            entries: {
                post: {
                    title: '',
                    body: '',
                    category_id: null,
                },
                images: [],
                tags: '',
            }
        }
    },

    components: {
        Link
    },

    methods: {
        storePost(){
            axios.post(route('admin.posts.store'), this.entries , {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
                .then( (res) => {
                    this.$refs.image_input.value = null
                    this.entries = {
                        post: {
                            title: '',
                                body: '',
                                category_id: null,
                        },
                        images: [],
                        tags: '',
                    }
                })
        },

        setImage(e){
            this.entries.images = [...e.target.files]
        }
    }
}
</script>

<style scoped>

</style>

