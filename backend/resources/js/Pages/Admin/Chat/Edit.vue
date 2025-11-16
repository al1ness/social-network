<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ chat.title }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ chat.status }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Edit",

    layout: AdminLayout,

    components: {
        Link
    },

    props: {
        chat: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
