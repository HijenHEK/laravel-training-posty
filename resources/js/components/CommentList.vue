<template>
<div>
  <single-comment v-for="comment in comments" @delete-comment="deleteComment(comment)" :canDelete="auth == comment.user.id" :key="comment.index" :comment="comment" :post="post"/>
</div>
</template>

<script>
import SingleComment from "./SingleComment"
export default {
    components :{
        SingleComment,
    },
    props :['post' , 'auth'],
    data(){
        return{
            
            comments : {}
        }
    },
    methods : {
        deleteComment(comment){
            axios.delete('/comment/'+ comment.id)
            .then(this.comments.pop(comment))
        }
    },
    mounted() {
        axios.get('/posts/'+this.post+'/comments')
            .then(response => this.comments = response.data)
    }
}
</script>

<style>

</style>