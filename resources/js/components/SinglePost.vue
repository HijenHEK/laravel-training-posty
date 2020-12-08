<template>
<div class="bg-white w-full border-2 rounded-lg py-2 px-4 my-2">
    
    <div class="flex justify-between ">
        <div class="user"> 
            <a href="#" class="mb-2 font-bold">
                {{post.user.name}}
            </a>
            <span class="text-xs text-gray-500"> {{ post.created_at | moment("from", "now")}}</span>
        </div>
        <delete-btn v-if="auth == post.user_id" @delete="deletePost" action="/posts/" :data="post.id"  />
    </div>

    <a :href="postLink">

        <div>
            {{post.body}}
        </div>

    </a>
    <div class="flex px-2">
        <div class="flex">
        <like @react="userupdate" model="Post" :el="post.id" />
            
            <a  :href="postLink">

                <span class=" mx-3 px-3 font-bold text-xs">
                    {{post.comments.length}} Comments
                </span>

            </a>

        </div>
    </div>

</div>

</template>

<script>
import DeleteBtn from './DeleteBtn.vue';
import Like from './Like' 
export default {
    props : ['post','auth'] , 
    components : {
        Like,
        DeleteBtn
    },
    computed : {
        postLink() {
            return '/posts/'+ this.post.id ;
        }
    },
    methods : {
        userupdate() {
            this.$emit('userupdate')
        },
        deletePost() {
            this.userupdate()
            console.log(this.post.user_id , this.auth)
            this.$emit('postsupdate')

        }
    }

}
</script>


