<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ tag.title }}</h1>
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
        tag: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
