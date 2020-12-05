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
    props : ['post' , 'liked'],
    computed : {
        value() {
            return this.liked ? 'unlike' : 'like'
        }
    },
    data() {
        return {
            likes : 0
        }
    },
    methods : {
        getLikes(){
            axios.get('/like/'+this.post)
                .then((response) => {
                    this.likes = response.data.length
                   
                })
        },
        react() {
            if(this.liked) {
                this.unlike()
            }else {
                this.like()
            }
        },
        like(){
            axios.post('/like/'+this.post)
                .then(()=>this.likes+=1)
        },
        unlike(){

            axios.delete('/like/'+this.post)
                .then(() => this.likes-=1)
        }
    },
    mounted() {
        this.getLikes()
    }
}
</script>

<style>

</style>