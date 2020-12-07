
<script>
import PostsList from './PostsList'
import Form from 'vform'
export default {
    props : {
        isuser :{
            type : Boolean,
            default : true ,
        },
        user :{
            type : Number,
            default : 0 ,
        },
        auth : {
            default : 0
        }
    },
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
        getPosts(page) {
            console.log(page)
            if(this.user != 0) {
            axios.get('/users/'+this.user+'/posts?page='+ page)
                .then((response) => {
                    this.posts = response.data
                    // console.log(response.data.data)
                })
            }else {
                axios.get('/feed?page='+page)
                .then((response) => {

                    this.posts = response.data
                    
                    // console.log(response.data.data)
                })
            }
            
        },
        userupdate() {
            this.$emit('userupdate')
        },
        addPost() {
            console.log(!this.isuser);
            if(!this.isuser) {
                return response('cant',419)
            }else {
                axios.post('/posts',this.form)
                    .then(()=>{
                        this.getPosts()
                        this.form.reset()
                        this.userupdate()
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