
<script>
import SinglePost from './SinglePost.vue' ;

export default {
    components : {
        SinglePost
    },
    data() {
        return {
            posts : {}
        }
    },
    methods : {
        getPosts() {
            axios.get('/feed')
                .then((response) => {
                    this.posts = response.data.data
                    // console.log(response.data.data)
                })
        }
    },
    mounted () {
        this.getPosts() 
    }
}
</script>

<style>

</style>