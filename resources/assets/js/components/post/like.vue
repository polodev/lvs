<template>
  <div>
    <hr>
    <p>
      //avatars
      hello world avatar
    </p>
    <p>
      <button class="btn-primary btn-xs">Like the post</button>
    </p>
    <p>
      <button class="btn-danger btn-xs">unlike the post</button>
    </p>
  </div>
</template>
<script>
  export default {
    mounted  () {

    },
    props: ['id']
  }
</script>