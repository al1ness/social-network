<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="tag in tags" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{tag.title}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        tags: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
