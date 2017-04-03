<template>
  <div>
    <p v-if="loading">Loading</p>
    <p v-if="!loading" class="text-center">
      <button class="btn btn-primary" v-if="status==0">Add friend</button>
      <button class="btn btn-primary" v-if="status=='pending'">Accept friend</button>
      <span class="success" v-if="status=='waiting'">waiting</span>
      <span class="success" v-if="status=='friend'">friend</span>
    </p>
  </div>
</template>
<script>
  export default {
    props: ['profile_user_id'],
    mounted () {
      axios('/check_relationship_status/' + this.profile_user_id).then((response) => {
        console.log("response", response.data);
        this.status = response.data.status;
        this.loading = false;
      })
    },
    data () {
      return {
        status: '',
        loading: true
      }
    }
  }
</script>