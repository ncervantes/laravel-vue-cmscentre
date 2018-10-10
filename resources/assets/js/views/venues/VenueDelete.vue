<template>
  <div>
    <b-form @submit.prevent ="deleteItem">
      <b-alert show variant="info">Delete Venue</b-alert>
      <h3>{{items.title}}</h3>
      <p>The action cannot be undone</p>
      <b-button type="submit" variant="primary">Delete</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
  </div>
</template>
<script>
  export default {

  data () {
    return {      
      items: '',
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/venues/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    deleteItem() {
        axios.delete('/api/venues/' + this.$route.params.id)
             .then((response)=> {
                 this.$router.push({name:'listVenue'})
             });
    } 
  },

  mounted() {    
    this.fetchData();    
  },
     
  }
</script>