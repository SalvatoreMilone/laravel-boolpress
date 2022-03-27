<template>
  <div>
      <h1>404 page not found</h1>
      <li><router-link :to="{ name: 'home'}">go back to a safe place</router-link></li>
  </div>
</template>

<script>
export default {
    name: "PageNotFound",
}
</script>

<style>

</style>