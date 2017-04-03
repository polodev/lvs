<template>
  <div>
    <p v-if="loading">Loading</p>
    <p v-if="!loading" class="text-center">
      <button class="btn btn-primary" v-if="status==0" @click="add_friend">Add friend</button>
      <button class="btn btn-primary" v-if="status=='pending'" @click="accept_friend">Accept friend</button>
      <span class="text-success" v-if="status=='waiting'">waiting</span>
      <span class="text-success" v-if="status=='friend'">friend</span>
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
    },
    methods: {
      add_friend() {
        this.loading = true;
        axios.get('/add_friend/' + this.profile_user_id).then((response) => {
          console.log("response", response);
          if (response.data == 1) {
            this.status = 'waiting';
            this.loading = false;
          }
        })
      },
      accept_friend () {
        this.loading = true;
        axios.get('/accept_friend/' + this.profile_user_id).then((response) => {
          console.log("response", response);
          if (response.data == 1) {
            this.status = 'friend';
            this.loading = false;
          }
        })
      
      }
    }
  }
</script>