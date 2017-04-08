<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default" v-for="post in posts">
          <div class="panel-heading">
              <img :src="post.user.avatar" alt="" class="avatar">
              {{ post.user.name }} 
              <span class="pull-right">
                {{ post.created_at }}
              </span>
          </div>
          <div class="panel-body">
            <p class="text-center">
              {{ post.content }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    mounted () {
      this.getFeed()
    },
    methods: {
      getFeed() {
        axios.get('/feed').then(response => {
          response.data.forEach(post => {
            this.$store.commit('addFeed', post);
          })
        });
      }
    },
    computed: {
      posts () {
        return this.$store.getters.posts;
      }
    }
  }
</script>
<style>
  .avatar {
    width: 40px;
    height: 45px;
    margin-right: 5px;
    padding: 2px;
    border: 1px solid #ddd;
  }
</style>