<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Affiliation</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/AffiliationForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '',
        url: '',        
        body: '',
        path_image:''
     },     
     
     errors: new Errors(),
            
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {      
        axios.post('/api/affiliations/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
      this.$router.replace('/affiliations'); 
    }    
    
  },

}   
  
</script>
