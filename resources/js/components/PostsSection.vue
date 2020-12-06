
<script>
import PostsList from './PostsList'
import Form from 'vform'
export default {
    props : {
        isUser: {
            type : Boolean ,
            default : true
        }
    } ,
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
            if(!this.isUser) {
                return response('cant',419)
            }else {
                axios.post('/posts',this.form)
                    .then(()=>{
                        this.getPosts()
                        this.form.reset()
                    })
            }
            
        }
    },
    mounted () {
        this.getPosts() 
    }
}
</script>

<style>

</style>