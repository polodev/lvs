<template>
  <div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ipsa quis autem quasi numquam iure sapiente esse quos illo repudiandae id ratione dignissimos delectus laudantium quas a, aliquid ullam inventore.
  </div>
</template>

<script>
export default {
  mounted () {
    this.listen();
  },
  data () {
    return {

    }
  },
  props: ['id'],
  methods: {
    listen () {
      Echo.private(`App.User.${this.id}`)
        .notification((notification) => {
          console.log("notification", notification);
          noty({
            type: 'success',
            layout: 'bottomRight',
            text: notification.name + notification.message
          });
          document.getElementById('noty_audio').play();
          this.$store.commit('addNotification', notification)
        });
    }
  }
}
</script>

<style lang="css">
</style>
