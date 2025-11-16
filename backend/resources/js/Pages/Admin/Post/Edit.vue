<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.posts.index')">BACK</Link>
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
                    <div class="mb-4">
                        <input
                            type="file"
                            ref="image_input"
                            @change="setImage"
                            multiple
                            class="border border-gray-200 p-4 w-full"
                            accept="image/*"
                        >
                    </div>
                    <div v-if="post.images.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div
                            v-for="image in post.images"
                            :key="image.id"
                            class="border rounded-lg overflow-hidden bg-gray-100 group relative"
                        >
                            <div class="aspect-video w-full relative">
                                <img
                                    :src="image.file_url"
                                    :alt="post.title"
                                    :title="post.title"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        <button
                            @click.prevent="deleteImage(image)"
                            class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                            title="Удалить изображение"
                        >
                            ✕
                        </button>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <input v-model="entries.tags" class="border border-gray-200 p-4 w-full" type="text" placeholder="tags">
                </div>
                <div class="mb-4">
                    <a href="#" @click.prevent="updatePost" class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white">UPDATE</a>
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
    name: "Edit",

    layout: AdminLayout,

    props: {
        categories: Array,
        post: Object
    },

    data() {
        return {
            entries: {
                post: this.post,
                images: [],
                tags: this.post.tags_as_string,
                _method: 'PATCH',
            }
        }
    },

    components: {
        Link
    },

    methods: {
        updatePost() {
            axios.post(route('admin.posts.update', this.post.id), this.entries , {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
                .then( (res) => {
                    this.$refs.image_input.value = null
                })
        },

        setImage(e) {
            this.entries.images = [...e.target.files]
        },

        deleteImage(image) {
            axios.delete(route('admin.images.destroy', image.id))
                .then( res => {
                    this.post.images = this.post.images.filter(img => img.id !== image.id)
                })
        }
    }
}
</script>

<style scoped>

</style>

