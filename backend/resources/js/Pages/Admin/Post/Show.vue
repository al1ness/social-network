<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ post.title }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ post.profile_id }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ post.category_id }}</p>
            </div>
            <div class="mb-4">
                <div v-if="post.images.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        v-for="image in post.images"
                        :key="image.id"
                        class="border rounded-lg overflow-hidden bg-gray-100"
                    >
                        <div class="aspect-video w-full">
                            <img
                                :src="image.file_url"
                                :alt="post.title"
                                :title="post.title"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    </div>
                </div>
                <div v-else class="text-gray-500 text-sm">
                    Нет изображений
                </div>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ post.body }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ post.views }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",

    layout: AdminLayout,

    components: {
        Link
    },

    props: {
        post: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
