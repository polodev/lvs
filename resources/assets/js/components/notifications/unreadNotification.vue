<template>
  <li>
    <a href="/notification">
      unread notifications <span class="badge">{{ notifications.length }}</span>
    </a>
  </li>
</template>

<script>
export default {
  mounted () {
    this.getUnread();
  },
  data () {
    return {
      notifications: []
    }
  },
  props: [],
  methods: {
      getUnread() {
        axios.get('/get_unread_notifications').then((response) => {
          this.notifications = response.data
        })
      }
    
  }
}
</script>

<style lang="css">
</style>