

<script>
import Form from 'vform'
import CommentList from "./CommentList";
export default {
    props : ['post'],

    components : {
        CommentList
    },
  data () {
    return {
      // Create a new form instance
      form: new Form({
        content : ''
      }),
      comments : {}
    }
  },

  methods: {
    addComment () {
      this.form.post('/comment/Post/'+this.post)
        .then((response) =>{
            this.form.content = ''
                this.getComments()
            });
        
    },
    getComments() {
        axios.get('/comment/Post/'+this.post)
            .then(response => this.comments = response.data)
    },
    deleteComment(comment){
            axios.delete('/comment/Post/'+ comment.id)   
            .then(()=>{
                this.getComments()
            }); 
        }
  },
  mounted() {
    Echo.channel('update')
            .listen ('Update' , e => {
              // this.posts = e.posts
                // // console.log('hello ' , e.posts)
                this.getComments()

            });
      this.getComments()
  }

}
</script>

<style>

</style>