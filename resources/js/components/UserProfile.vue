<script>
import PostSection  from './PostsSection'
export default {
    props :['userid'],
    components : {
        PostSection
    },
    
    data() {
        return {
            user : {}
        }
    },
    methods : {
        getUser() {
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