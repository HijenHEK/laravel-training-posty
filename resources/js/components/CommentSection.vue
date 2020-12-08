

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
        axios.get('/posts/'+this.post+'/comments')
            .then(response => this.comments =response.data)
    },
    deleteComment(comment){
            axios.delete('/comment/Post/'+ comment.id)   
            .then(()=>{
                this.getComments()
            }); 
        }
  },
  mounted() {
      this.getComments()
  }

}
</script>

<style>

</style>