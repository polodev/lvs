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
            console.log(notification.type);
        });
    }
  }
}
</script>

<style lang="css">
</style>
