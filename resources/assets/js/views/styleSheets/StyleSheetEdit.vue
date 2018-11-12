<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Affiliation</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import table_form from '../templates/StyleSheetForm.vue'

export default {
  
  data () {
    return {
     
     items:{
       title: ''
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/style-sheets/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;        
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },   

    saveForm() {         
        axios.put('/api/style-sheets/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/style-sheets');
    }
  },
 
  mounted() {    
    this.fetchData();    
  },
    
}   
  
</script>


