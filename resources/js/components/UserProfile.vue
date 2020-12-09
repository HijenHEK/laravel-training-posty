<script>
import PostSection  from './PostsSection'
import FollowBtn  from './FollowBtn'
export default {
    props :['userid'],
    components : {
        PostSection,
        FollowBtn
    },
    
    data() {
        return {
            user : {}
        }
    },
    methods : {
        getUser() {
            console.log('data admin')
            axios.get('/users/' + this.userid +'/data')
                .then(response => this.user = response.data)
        }
    },
    mounted() {
        Echo.channel('update')
            .listen ('Update' , e => {
                // this.posts = e.posts
                // // console.log('hello ' , e.posts)
                this.getUser()
                console.log('user-update')

            });  
        this.getUser() 
    }
}
</script>

<style>

</style>