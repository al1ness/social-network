<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="profile in profiles" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{profile.name}}</h3>
                <h3>{{profile.user_id}}</h3>
                <h3>{{profile.avatar_url}}</h3>
                <h3>{{profile.phone}}</h3>
                <h3>{{profile.birthdate}}</h3>
                <h3>{{profile.location}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        profiles: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
