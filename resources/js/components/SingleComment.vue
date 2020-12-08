<template>
   <div class="bg-white lg:w-4/5 w-full   my-2  mx-5 rounded">
                        <div class="flex justify-between">
                            <div class="user">
                                <a href="#" class="mb-2 text-sm font-bold">
                                    {{comment.user.name}}
                                </a>
                                <span class="text-xs text-gray-500"> {{ comment.created_at | moment("from", "now")}}</span>
                            </div>
                            
                                    <button v-if="canDelete" @click="deleteComment()" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                                        delete
                                    </button>

                                
                        </div>
                        <p class="text-sm">
                            {{comment.content}}

                        </p>
                        <like model="Comment" :el="comment.id" />
                        
    </div>
</template>

<script>
import Like from './Like.vue'
export default {
    components: {
        Like ,
    },
    props: ['comment','canDelete'],
    methods : {
        deleteComment() {
            this.$emit('delete-comment')
        }
    },
    mounted() {
        console.log(this.comment)
    }
}
</script>

<style>

</style>