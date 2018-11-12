<template>
  <div>
     <b-alert show>Page Template</b-alert>
     <b-form @submit.prevent="backToList">
       <p>Page Template Title: {{items.title}}</p>
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
        axios.get('/api/style-sheets/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data; 
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/style-sheets');
    } 
  },

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>