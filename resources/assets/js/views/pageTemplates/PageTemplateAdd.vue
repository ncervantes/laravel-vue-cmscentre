<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Page Template</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/PageTemplateForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
             
     },     
     
     errors: new Errors(),
            
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {      
        axios.post('/api/page-templates/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
      this.$router.replace('/page-templates'); 
    }    
    
  },

}   
  
</script>
