<template>
  <div>
    <hr>
    <p>
      <img v-for="like in post.likes" :src="like.user.avatar" class="avatar-like" alt="">
    </p>
    <p>
      <button class="btn-primary btn-xs" v-if="isAuthUserLike" @click="likePost">Like the post</button>
      <button class="btn-danger btn-xs" v-else="isAuthUserLike" @click="unlikePost">unlike the post</button>
    </p>
  </div>
</template>
<script>
  export default {
    mounted  () {

    },
    props: ['id'],
    methods: {
      likePost() {
        axios.get('/like/' + this.id).then(response => {
          this.$store.commit('updatePostLike', {
            id: this.id,
            like: response.data
          })
        })
      },
      unlikePost(likeId) {
        axios.get('/unlike/' + this.id).then(response => {
          console.log('response', response);
          this.$store.commit('updatePostUnlike', {
            post_id: this.id,
            like_id: response.data
          });
        })
      }
    },
    computed: {
      likers () {
        let likers = [];
        this.post.likes.forEach(like => {
          likers.push(like.user.id);
        })
        return likers;
      },
      isAuthUserLike () {
        console.log('isAuthUserLike', this.$store.getters.getAuthUser.id)
        console.log('isAuthUserLike likers', this.likers)
        var isAuthUserLike = this.likers.indexOf(this.$store.getters.getAuthUser.id)
        if (isAuthUserLike < 0) {
          return true;
        }else {
          return false;
        }
      },
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