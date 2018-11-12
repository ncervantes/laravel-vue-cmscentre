<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Event Category</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/EventCategoryForm.vue'

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

    saveForm() {    console.log(this.items)  
        axios.post('/api/eventcategories/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/eventcategories'); 
    }    
    
  },

  

}   
  
</script>
