<template>
    <div>
        <div class="bg-white p-4 border border-gray-200">
            <div class="text-lg mb-4">
                <h1>{{ profile.name }}</h1>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ profile.user_id }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ profile.avatar_url }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ profile.phone }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ profile.birthdate }}</p>
            </div>
            <div class="text-gray-800 text-sm mb-4">
                <p>{{ profile.location }}</p>
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
        profile: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
