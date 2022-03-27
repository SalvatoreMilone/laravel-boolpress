<template>
  <header>
      <li><router-link :to="{ name: 'home'}">HOME</router-link></li>
      <li><router-link :to="{ name: 'about'}">Chi SIAMO</router-link></li>
  </header>
</template>

<script>
export default {
    name: "Header",
}
</script>

<style>

</style>