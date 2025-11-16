<template>
    <div class="min-h-screen w-full overflow-x-hidden flex flex-col">
        <section class="w-full bg-gradient-to-r from-slate-700 to-slate-800 border-b border-slate-600 shadow-lg">
            <header class="w-full py-4 px-4">
                <h1 class="text-2xl font-bold text-slate-100 text-center tracking-wider">ADMIN PANEL</h1>
            </header>
        </section>
        <section class="flex">
            <aside class="w-1/4 p-4 bg-gradient-to-b from-gray-800 to-gray-900 min-h-screen shadow-lg">
                <div class="sticky top-4">
                    <h2 class="text-gray-400 text-sm font-semibold uppercase tracking-wider px-4 py-2">Navigation</h2>

                    <Link :href="route('dashboard')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </Link>

                    <Link :href="route('admin.posts.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Posts
                    </Link>

                    <Link :href="route('admin.categories.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Categories
                    </Link>

                    <Link :href="route('admin.tags.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Tags
                    </Link>

                    <Link :href="route('admin.files.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Files
                    </Link>

                    <Link :href="route('admin.images.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Images
                    </Link>

                    <Link :href="route('admin.videos.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Videos
                    </Link>

                    <Link :href="route('admin.comments.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Comments
                    </Link>

                    <Link :href="route('admin.profiles.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profiles
                    </Link>

                    <Link :href="route('admin.groups.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Groups
                    </Link>

                    <Link :href="route('admin.chats.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        Chats
                    </Link>

                    <Link :href="route('admin.messages.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Messages
                    </Link>

                    <Link :href="route('admin.likes.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Likes
                    </Link>

                    <Link :href="route('admin.follows.index')" class="flex items-center text-gray-200 p-4 border-b border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200 rounded-md group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Follows
                    </Link>
                </div>
            </aside>
            <article class="w-3/4 p-6 bg-gray-50 min-h-screen">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <slot />
                </div>
            </article>
        </section>
        <section class="bg-gray-800 border-t border-gray-700">
            <footer class="py-4 px-6">
                <p class="text-center text-gray-400 text-sm">
                    &copy; {{ new Date().getFullYear() }} Admin Panel. All rights reserved.
                </p>
            </footer>
        </section>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "AdminLayout",

    components: {
        Link
    }
}
</script>
