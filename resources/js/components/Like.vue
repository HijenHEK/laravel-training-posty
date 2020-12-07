<template>
                
        <div>

                <button  @click.prevent="react()"  
                type="submit" class="text-xs text-gray-700 border-2 px-1 rounded-lg">
                    
                    {{value}}
                    
                </button>

            <span
                class=" font-bold text-xs @auth  @if (Auth::user()->like($post)) text-blue-700 @endif @endauth">
                
                   {{likes}} likes
            </span>

        </div>

</template>

<script>
export default {
    props : ['post'],
    computed : {
        value() {
            return this.liked ? 'unlike' : 'like'
        }
    },
    data() {
        return {
            likes : 0,
            liked : null
        }
    },
    methods : {
        getLikes(){
            axios.get('/like/'+this.post)
                .then((response) => {
                    if(response.data[0]) {
                        this.likes = response.data[0].length
                        this.liked = response.data[1]

                    }else {
                        this.likes = 0
                        this.liked = false 
                    }
                })
        },
        react() {
            if(this.liked) {
                this.unlike()
            }else {
                this.like()
            }
            this.$emit('react')
        },
        like(){
            axios.post('/like/'+this.post)
                .then(()=>{
                    this.likes+=1
                    this.liked = true
                })
        },
        unlike(){

            axios.delete('/like/'+this.post)
                .then(()=>{
                    this.likes-=1
                    this.liked = false
                })
        }
    },
    mounted() {
        this.getLikes()
    }
}
</script>

<style>

</style>