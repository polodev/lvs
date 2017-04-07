<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
              <textarea v-model="content" name="post_content" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-success pull-right" :disabled="btnDisabled" @click="createPost()">create a post</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted () {
    
  },
  data () {
    return {
      content: "",
      btnDisabled: true
    }
  },
  props: [],
  methods: {
    createPost() {
      axios.post('/post/create', {content: this.content}).then(response => {
        console.log(response);
        this.content = "";
        noty({
          type: 'success',
          layout: 'bottomRight',
          text: "your post is published"
        });
      })
    }
  },
  watch: {
    content() {
      if (this.content.length > 0) {
        this.btnDisabled = false
      } else {
        this.btnDisabled = true
      }
    }
  }
}
</script>

<style lang="css">
</style>