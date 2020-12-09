<template>
    <div @click.prevent="doAction()" 
    class="px-3 py-1  text-white  rounded-lg cursor-pointer " :class="style" > 
        {{value}}
    </div>
</template>

<script>
export default {
    props: {
        user : {
            type : String,
            required : true
        },
        unfollow : {
            type : Boolean ,
            default : false
        }
    },
    
    computed : {
        style(){
            return this.unfollow ? 'bg-gray-300 hover:bg-red-500' : 'bg-blue-500 hover:bg-blue-700'
        },
        value(){
            return this.unfollow ? 'unfollow' : 'Follow'
        }
    },
    methods: {
        
        doAction() {
            if(this.unfollow) {
                axios.delete('/follow/'+this.user)
                    // .then(()=>{
                    //     this.$emit('userupdate')
                    // })
            }else {
                axios.post('/follow/'+this.user)
                    // .then(()=>{
                    //     this.$emit('userupdate')
                    // })
            }
                
        }
    }
}
</script>

<style>

</style>