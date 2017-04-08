<template>
  <div>
    
  </div>
</template>

<script>
export default {
  mounted () {
    this.getAuthUser();
  },
  methods: {
    getAuthUser() {
      axios.get('/get_auth_user_data').then(response => {
        this.$store.commit('setAuthUserData', response.data);
      })
    }
  }
}
</script>

<style lang="css">
</style>