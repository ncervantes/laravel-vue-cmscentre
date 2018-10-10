<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New  Camp Category</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../../core/errors'

import table_form from '../../templates/CampCategoryForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '',
        
     },     
     
     errors: new Errors(),        
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {      
        axios.post('/api/camp-categories/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/camp-categories'); 
  }    
    
  },

  

}   
  
</script>
