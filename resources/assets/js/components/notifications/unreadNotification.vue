<template>
  <li>
    <a href="/notification">
      unread notifications <span class="badge">{{ allNotificationsCount }}</span>
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
          response.data.forEach((notification) => {
            this.$store.commit('addNotification', notification);
          })
        })
      }
  },
  computed: {
    allNotificationsCount () {
      return this.$store.getters.allNotificationsCount;
    }
  }
}
</script>

<style lang="css">
</style>