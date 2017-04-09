<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group">
          <input type="text" class="form-control" v-model="searchKey" @keyup.enter="search">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import algoliasearch from 'algoliasearch';
var client = algoliasearch('QU9E2N02CE', 'b7dd14f43589bb720730409ba9d339ae');
var index = client.initIndex('users');
export default {
  mounted () {
  },
  data () {
    return {
      searchKey: ""
    }
  },
  props: [],
  methods: {
    search() {
      index.search(this.searchKey, function(err, content) {
        console.log("content", content.hits);
      });
    }
  }
}
</script>

<style lang="css">
</style>