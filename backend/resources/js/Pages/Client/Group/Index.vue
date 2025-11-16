<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="group in groups" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{group.owner_id}}</h3>
                <h3 class="font-bold">{{group.title}}</h3>
                <h3>{{group.description}}</h3>
                <h3>{{group.avatar_url}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        groups: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
