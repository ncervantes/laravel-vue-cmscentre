<template>
  <div>
    <b-alert show>Affiliation</b-alert> 
     <b-form @submit.prevent="backToList">
       <p>Affiliation Name: {{items.title}}</p> 
       <ul>         
           <li>Affiliation Url: {{items.url}}</li>         
           <li>Affiliation Body: {{items.body}}</li>
           <li>Affiliation Logo: <img :src="items.path_image"></li>
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
        axios.get('/api/affiliations/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/affiliations');
    } 
  },
  

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>