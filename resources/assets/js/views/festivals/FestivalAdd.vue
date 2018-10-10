<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm" >
     <b-alert show variant="info">Create New Festival</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/FestivalForm.vue'

export default {
  
  data () {
    return {
      
     items:{    
        title:'',    
        affiliation_id: null,        
        section: '',         
        listingblurb:'',
        longblurb:'',
        pagination: 0,
        path_thumbnail:'',
        path_main:''        
     },  
          
     errors: new Errors(),        
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {       
        console.log(this.items);   
        axios.post('/api/festivals/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/festivals'); 
    }, 
    
  },
 

}   
  
</script>
