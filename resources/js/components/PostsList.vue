<template>
        <div class="mt-5">
                    <div  v-if="posts" >
                        <single-post @userupdate="userupdate()" v-for="post in posts.data" :key="post.index" :post="post"/>
                    </div>  
                    <p v-else class="text-xs text-gray-500">
                        there is no posts yet !
                    </p>
                    <pagination :data="this.posts" @pagination="getResults"></pagination>
                    
                </div>
</template>
<script>
import Pagination from './Pagination.vue' ;
import SinglePost from './SinglePost.vue' ;

export default {
    props : ['posts'],
    components : {
        SinglePost,
        Pagination
    },
    methods : {
        userupdate() {
            this.$emit('userupdate')
        },
        getResults(page = 1) {
			this.$emit('pagination' , page)
		}
    }
    
}
</script>

<style>

</style>