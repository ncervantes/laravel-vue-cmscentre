<template>
  <div>
    <b-alert show>{{items.title}}</b-alert>   
 
     <ul>         
         <li>Affiliation Url: {{items.url}}</li>
         <li>Affiliation Logo: {{items.logo}}</li>
         <li>Affiliation Body: {{items.body}}</li>
     </ul>
     
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

    fetchAffiliation(){
        let app = this;
        axios.get('/api/affiliations/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    } 
  },
  

  mounted() {    
    this.fetchAffiliation();    
  },
}   
  
</script>