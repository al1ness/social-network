<template>
  <div class="w-1/2 mx-auto p-4">
      <div>
          <div v-for="post in posts" class="mb-4 pb-4 border-b border-gray-400">
              <h3 class="font-bold" >{{post.title}}</h3>
              <h3>{{post.body}}</h3>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "Index",

    props: {
        posts: {
            type: Array,
            required: false,
        }
    }
}
</script>

<style scoped>

</style>
