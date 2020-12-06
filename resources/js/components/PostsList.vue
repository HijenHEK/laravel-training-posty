<template>
        <div class="mt-5">
                    <div  v-if="posts" >
                        <single-post v-for="post in posts" :key="post.index" :post="post"/>
                    </div>  
                    <p v-else class="text-xs text-gray-500">
                        there is no posts yet !
                    </p>
                    
                    
                </div>
</template>
<script>
import SinglePost from './SinglePost.vue' ;

export default {
    props : ['posts'],
    components : {
        SinglePost
    },
    
}
</script>

<style>

</style>