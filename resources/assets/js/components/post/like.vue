<template>
  <div>
    <hr>
    <p>
      <img v-for="like in post.likes" :src="like.user.avatar" class="avatar-like" alt="">
    </p>
    <p>
      <button class="btn-primary btn-xs">Like the post</button>
    </p>
    <p>
      <button class="btn-danger btn-xs">unlike the post</button>
    </p>
  </div>
</template>
<script>
  export default {
    mounted  () {

    },
    props: ['id'],
    computed: {
      post() {
        return this.$store.state.posts.find(post => {
          return this.id == post.id;
        })
      }
    }
  }
</script>
<style>
  .avatar-like {
    width: 40px;
    height: 45px;
    padding: 2px;
    border: 1px solid #ddd;
    margin: 5px;
  }
</style>