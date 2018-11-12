<template>
  <div>
    <b-alert show>Event Category</b-alert>

    <b-form @submit.prevent="backToList">
       <p>Category: {{items.title}}</p>
       <p>Body: {{items.description}}</p>
       <b-button type="submit" variant="primary">OK</b-button>
    </b-form>

  </div>

</template>

<script>

export default {  

    data () {
    return {      
      items:''     
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/eventcategories/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data; 
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/eventcategories');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  },
 }
  
</script>