<template>
  <header>
      <li ><router-link :to="{ name: 'home'}" class="btn-2">HOME</router-link></li>
      <li ><router-link :to="{ name: 'about'}" class="btn-2">CHI SIAMO</router-link></li>
  </header>
</template>

<script>
export default {
    name: "Header",
}
</script>

<style lang="scss" scoped>

$s-blue: #006D77;
$s-l-blue: #83C5BE;
$s-w: #EDF6F9;
$s-pink: #FFDDD2;
$s-d-pink: #E29578;

// My Colors

header{
  background-color: $s-blue;
  display: flex;
  align-items: center;
  height: 70px;
  & li{
    list-style: none
    ;
    & a{
      color: $s-pink;
      text-decoration: none;
    }
  }
}

.btn-2{
  padding: 5px 10px;
  border: 3px solid $s-pink;
  border-radius: 10px;
  margin: 10px 5px;
}

</style>