<template>
  <div>
      <ul class="main-card-ul">
          <li v-for="(post, index) in posts" :key="index" class="main-card">
              <div class="main-card-index">{{index}}</div>
              <div>Categoria : {{post.category_id}}</div>
              <div>Titolo : {{post.title}}</div>
              <div>Contentuto :</div>
              <div>{{post.content}}</div>
        </li>
      </ul>
  </div>
</template>

<script>
export default {
    name: "Main",
    data() {
        return{
            posts: [
                "1",
                "2",
                "3"
            ],
        }
    },
    created() {
        axios
        .get("/api/posts")
        .then((data)=>{
            this.posts = data.data;
            console.log(data)
        })
    }
}
</script>

<style>

</style>