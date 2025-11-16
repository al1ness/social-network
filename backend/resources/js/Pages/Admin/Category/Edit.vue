<template>
    <div>
        <div class="mb-4">
            <Link class="text-xs inline-block px-3 py-2 bg-sky-600 border border-sky-700 text-white" :href="route('admin.categories.index')">BACK</Link>
        </div>
        <div class="mb-4">
            <input v-model="category.title" class="border border-gray-200 p-4 w-full" type="text" placeholder="title">
        </div>
        <div class="">
            <Link href="#" @click.prevent="updateCategory" class="text-xs text-white inline-block px-3 py-2 bg-sky-600 border-sky-700" :href="route('admin.categories.edit', category.id)">UPDATE</Link>
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

    components: {
        Link
    },

    props: {
        category: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            _method: 'PATCH',
        }
    },

    methods: {
        updateCategory() {
            axios.patch(route('admin.categories.update', this.category.id), {
                title: this.category.title
            })
        }
    }
}
</script>

<style scoped>

</style>
