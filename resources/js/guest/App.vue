<template>
  <div class="base">
    <div>

      <div class="second-header">
        <button class="btn-1"><a href="/login">Admin Login</a></button>
      </div>

      <Header />
      <Main />
      
    </div>

      <Footer />
  </div>
</template>

<script>
import Header from './components/Header.vue';
import Main from './components/Main.vue';
import Footer from './components/Footer.vue';
export default {
  name: "App",
  components: {
    Header,
    Main,
    Footer
  }
}
</script>

<style lang="scss" scoped>

$s-blue: #006D77;
$s-l-blue: #83C5BE;
$s-w: #EDF6F9;
$s-pink: #FFDDD2;
$s-d-pink: #E29578;

// My Colors
.second-header{
  background-color: #003034;
}
.base{
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
</style>