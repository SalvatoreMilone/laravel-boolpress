<template>
    <main>
        <router-view :key="$route.path"></router-view>

               <!-- <div>
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
            </li>
        </ul>
    </div>
-->

    </main>
</template>

<script>
export default {
    name: "Main",
}
</script>

<style>

</style>