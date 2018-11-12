<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New StyleSheet</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/StyleSheetForm.vue'

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
        axios.post('/api/style-sheets/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
      this.$router.replace('/style-sheets'); 
    }    
    
  },

}   
  
</script>
