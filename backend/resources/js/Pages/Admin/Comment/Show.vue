<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ comment.profile_id }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ comment.commentable_type }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ comment.commentable_id }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ comment.parent_id }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ comment.body }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ comment.published_at }}</p>
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
        comment: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
