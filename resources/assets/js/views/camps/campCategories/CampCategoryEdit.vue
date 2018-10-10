<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Camp Age</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../../core/errors'

import table_form from '../../templates/CampCategoryForm.vue'

export default {
  
  data () {
    return {
     
     items:{
       title: 0,           
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/camp-categories/' + this.$route.params.id + '/edit')
             .then(function(resp) { console.log(resp);
                app.items = resp.data;                                       
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },   

    saveForm() {         
        axios.put('/api/camp-categories/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/camp-categories');
    }
  },
 
  mounted() {    
    this.fetchData();    
  },


   
    
}   
  
</script>


