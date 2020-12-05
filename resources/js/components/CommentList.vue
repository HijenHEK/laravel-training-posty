<template>
<div>
  <single-comment v-for="comment in comments" @delete-comment="deleteComment(comment)" 
  :canDelete="auth == comment.user.id" :key="comment.index" :comment="comment"/>
</div>
</template>

<script>
import SingleComment from "./SingleComment"
export default {
    components :{
        SingleComment,
    },
    props :[ 'comments' , 'auth'],
    
    methods : {
            deleteComment(comment){
                this.$emit('delete-comment',comment)
            }
    },
    mounted(){
    }
    
}
</script>

<style>

</style>