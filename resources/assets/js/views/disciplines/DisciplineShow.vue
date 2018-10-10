<template>
  <div>
    <b-alert show>Discipline</b-alert> 
     <b-form @submit.prevent="backToList"> 
	     <ul>
	         <li>Discipline Name: {{items.title}}</li>         
	         <li>Display Filter on Menu: {{items.display_filter}}</li> 
	     </ul>
	     <b-button type="submit" variant="primary">OK</b-button>
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
        axios.get('/api/disciplines/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/disciplines');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  }, 
}   
  
</script>