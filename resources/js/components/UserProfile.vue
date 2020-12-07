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
        this.getUser()   
    }
}
</script>

<style>

</style>