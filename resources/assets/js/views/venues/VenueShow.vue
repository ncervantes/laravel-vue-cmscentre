<template>
  <div>
    <b-alert show>Venue</b-alert>      
 
     <b-form @submit.prevent="backToList">
       <ul> 
           <li>Venue Name: {{items.title}}</li>                  
           <li>Logo: <img :src="items.logo"></li>
           <li>Address: {{items.address}}</li>
           <li>City: {{items.city}}</li>
           <li>Province: {{items.province}}</li>
           <li>Postal Code: {{items.postal}}</li>
           <li>URL: {{items.url}}</li>
           <li>Map URL: {{items.map_url}}</li>
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
        axios.get('/api/venues/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/venues');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  }, 
}     
  
</script>