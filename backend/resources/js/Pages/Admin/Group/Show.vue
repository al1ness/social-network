<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ group.owner_id }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ group.title }}</p>
            </div>
            <div class="text-gray-700 text-sm mb-4">
                <p>{{ group.description }}</p>
            </div>
            <div class="text-gray-700 text-sm mb-4">
                <p>{{ group.avatar_url }}</p>
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
        group: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
