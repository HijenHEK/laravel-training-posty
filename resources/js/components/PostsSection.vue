
<script>
import PostsList from './PostsList'
import Form from 'vform'
export default {
    components : {
        PostsList
    },
    data() {
        return {
            posts : {} ,
            form : new Form({
                body : ''
            }),
        }
    },
    methods : {
        getPosts() {
            axios.get('/feed')
                .then((response) => {
                    this.posts = response.data.data
                    // console.log(response.data.data)
                })
        },
        addPost() {
            axios.post('/posts',this.form)
                .then(()=>{
                    this.getPosts()
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