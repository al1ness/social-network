<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="comment in comments" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{comment.profile_id}}</h3>
                <h3>{{comment.parent_id}}</h3>
                <h3 class="font-semibold">{{comment.body}}</h3>
                <h3>{{comment.published_at}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        comments: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
