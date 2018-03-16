<template>
  <div>
    <h1>users item {{$route.params.id}}</h1>
    item {{user}}
  </div>
</template>
<script>
  export default {
    props: {
      user: {}
    }
  }
</script>
