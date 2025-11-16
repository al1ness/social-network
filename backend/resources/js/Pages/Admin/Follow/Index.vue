<template>
    <div>
        <div class="mb-4 flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Follows Management</h1>
        </div>
        <div class="mb-4 flex justify-between items-center">
            <Link class="inline-flex items-center px-3 py-2 bg-sky-600 border border-sky-700 text-white text-sm font-medium rounded-lg hover:bg-sky-700 transition-colors shadow-sm"
                  :href="route('admin.follows.create')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                CREATE FOLLOW
            </Link>

            <button
                @click="toggleFilters"
                class="flex items-center gap-2 px-3 py-2 text-xs bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-lg transition shadow-sm"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
        </div>

        <transition name="fade">
            <div v-if="filtersVisible" class="mb-4 p-4 bg-white border border-gray-200 rounded-xl shadow-sm grid grid-cols-1 sm:grid-cols-3 gap-4">
                <input
                    v-model.lazy="filter.title"
                    class="border border-gray-200 rounded-md p-2 text-sm w-full"
                    type="text"
                    placeholder="Title"
                />

                <input
                    v-model.lazy="filter.published_at_from"
                    class="border border-gray-200 rounded-md p-2 text-sm w-full"
                    type="date"
                    placeholder="Date from"
                />

                <input
                    v-model.lazy="filter.views_from"
                    class="border border-gray-200 rounded-md p-2 text-sm w-full"
                    type="number"
                    placeholder="Views from"
                />

                <div class="col-span-full flex justify-end">
                    <button
                        v-if="Object.keys(filter).length > 0"
                        @click.prevent="filter = {}"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md transition-colors"
                    >
                        Reset
                    </button>
                </div>
            </div>
        </transition>

        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-x-auto">
            <table class="bg-white w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 border-b border-r border-gray-200 text-xs">ID</th>
                    <th class="p-4 border-b border-r border-gray-200 text-xs">FOLLOWER_ID</th>
                    <th class="p-4 border-b border-r border-gray-200 text-xs">FOLLOWING_ID</th>
                    <th class="p-4 border-b border-r border-gray-200 text-xs">ACTIONS</th>
                </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                <tr v-for="follow in followsData" :key="follow.id" class="hover:bg-gray-50 transition">
                    <td class="text-center p-4 border-b border-r border-gray-200">{{ follow.id }}</td>
                    <td class="text-center p-4 border-b border-r border-gray-200">{{ follow.follower_id }}</td>
                    <td class="text-center p-4 border-b border-r border-gray-200">{{ follow.following_id }}</td>

                    <td class="p-4 border-b border-gray-200 text-center">
                        <div class="flex justify-center gap-2">
                            <Link :href="route('admin.follows.show', follow.id)" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-sky-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                     class="w-5 h-5 text-sky-500 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </Link>

                            <a href="#" @click.prevent="deleteFollow(follow)" class="p-2 hover:bg-gray-100 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Index",

    layout: AdminLayout,

    components: {
        Link
    },

    props: {
        follows: {
            type: Array,
            required: false
        }
    },

    data() {
        return {
            followsData: this.follows,
            filter: {},
            filtersVisible: false,
        };
    },

    methods: {
        toggleFilters() {
            this.filtersVisible = !this.filtersVisible;
        },

        getFollows() {
            axios.get(route("admin.follows.index"), {
                params: this.filter
            })
                .then((res) => {
                    this.followsData = res.data;
                });
        },

        deleteFollow(follow) {
            axios.delete(route("admin.follows.destroy", follow.id))
                .then(() => {
                    this.followsData = this.followsData.filter((followItem) => followItem.id !== follow.id);
                });
        },
    },

    watch: {
        filter: {
            handler() {
                this.getFollows();
            },
            deep: true,
        },
    },
}
</script>

<style scoped>

</style>
