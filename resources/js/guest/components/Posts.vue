<template>
     <div>
        <ul class="main-card-ul">
            <li v-for="(post, index) in posts" :key="post.slug" class="main-card">
                <div class="main-card-index">{{index}}</div>
                <div class="title">{{post.title}}</div>
                <div class="content">{{post.content}}</div>
                <div v-if="post.category" class="category">{{post.category.name}}</div>
                <ul>
                    <li v-for="tag in post.tags" :key="tag.slug">{{tag.name}}</li>
                </ul>
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

<style lang="scss" scoped>

$s-blue: #006D77;
$s-l-blue: #83C5BE;
$s-w: #EDF6F9;
$s-pink: #FFDDD2;
$s-d-pink: #E29578;


.main-card-ul{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: center;
    .main-card{
        background-color: $s-l-blue;
        color: rgb(49, 49, 49);
        font-weight: bolder;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 300px;
        min-height: 400px;
        padding: 10px;
        border-radius: 10px;
        margin: 10px;
    
        &>*{
            padding-bottom: 20px;
        }

        & a{
            color: $s-pink;
            text-decoration: none;
        }

        .title{
            color: $s-blue;
        }

        .category{
            color: $s-blue;
        }

        ul{
            padding: 0 0 10px 0;
            & li{
                list-style: none;
                color: $s-blue;
            }
        }
    }
}

.main-card-index{
    font-size: 3rem;
    color: white;
}
</style>