<template>
  <div>
    <b-alert show>Camp Category</b-alert>

    <b-form @submit.prevent="backToList">
       <p>Category: {{items.title}}</p>
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
        axios.get('/api/camp-categories/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data; 
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/camp-categories');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  },
 }
  
</script>