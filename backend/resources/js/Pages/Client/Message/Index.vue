<template>
    <div class="w-1/2 mx-auto p-4">
        <div>
            <div v-for="message in messages" class="mb-4 pb-4 border-b border-gray-400">
                <h3>{{message.chat_id}}</h3>
                <h3>{{message.sender_id}}</h3>
                <h3>{{message.body}}</h3>
                <h3>{{message.read_at}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        messages: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
