<template>
        <div class="mt-5">
                    <div  v-if="posts" >
                        <single-post :auth="auth" @userupdate="userupdate()" @postsupdate="getResults(page)" v-for="post in posts.data" :key="post.index" :post="post"/>
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
    props : ['posts','auth'],
    data () {
        return {
            page : 1
        }
    },
    components : {
        SinglePost,
        Pagination
    },
    computed : {
        
    },
    methods : {
        userupdate() {
            this.$emit('userupdate')
        },
        postsupdate() {
            this.$emit('postsupdate')
        },
        getResults(page = 1) {
            this.$emit('pagination' , page)
            this.page = page 
            console.log("   auth" ,this.auth)

		}
    }
    
}
</script>

<style>

</style>