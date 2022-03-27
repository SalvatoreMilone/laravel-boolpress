<template>
     <div>
        <ul class="main-card-ul">
            <li v-for="(post, index) in posts" :key="post.slug" class="main-card">
                <div class="main-card-index">{{index}}</div>
                <div>Titolo : {{post.title}}</div>
                <div>Contentuto :</div>
                <div>{{post.content}}</div>
                <div v-if="post.category">{{post.category.name}}</div>
                <div>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.slug">{{tag.name}}</li>
                    </ul>
                </div>
                <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza post</router-link>
            </li>
        </ul>

    </div>
</template>

<script>
    export default {
    name: "Posts",
    data() {
        return{
            posts: [],
        }
    },
    created() {
        axios
        .get("/api/posts")
        .then((data)=>{
            this.posts = data.data;
        })
    }
} 
</script>

<style lang="scss">
.main-card-ul{
    width: 100vw;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    .main-card{
        background-color: rgb(174, 228, 198);
        color: rgb(49, 49, 49);
        font-weight: bolder;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 300px;
        padding: 10px;
        border-radius: 10px;
        margin: 10px;
    
        &>*{
            padding-bottom: 20px;
        }
    }
}

.main-card-index{
    font-size: 3rem;
    color: white;
}
</style>