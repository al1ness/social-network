<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ file.profile_id }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ file.fileable_type }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ file.fileable_id }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ file.name }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ file.file_path }}</p>
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
        file: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
