<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="follow in follows" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{follow.follower_id}}</h3>
                <h3>{{follow.following_id}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        follows: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
