<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Discipline</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/DisciplineForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '',
        display_filter: ''      
        
     },     
     
     errors: new Errors(),        
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {        
        axios.post('/api/disciplines/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/disciplines'); 
  }    
    
  },

  

}   
  
</script>
