<template>
  <div>
     <b-alert show>Page Template</b-alert>
     <b-form @submit.prevent="backToList">
       <p>Page Template Title: {{items.title}}</p>
       <p>Page Template Detail: {{items.detail}}</p>
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
        axios.get('/api/page-templates/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data; 
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/page-templates');
    } 
  },

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>