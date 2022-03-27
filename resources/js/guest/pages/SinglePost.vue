<template>
  <div>
      <h1>single post</h1>
        <ul class="main-card-ul">
            <li class="main-card">
                <div>Titolo : {{post.title}}</div>
                <div>Contentuto :</div>
                <div>{{post.content}}</div>
                <div v-if="post.category">categoria : {{post.category.name}}</div>
                <div>
                  tag:
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.slug">{{tag.name}}</li>
                    </ul>
                </div>
            </li>
        </ul>
  </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return{
            post: {},
        }
    },
    created() {
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((data)=>{
            this.post = data.data;
            console.log(this.post);
        }).catch( (error) => {
            this.$router.push({name: 'page-404'})
        })
    }
}
</script>

<style>

</style>