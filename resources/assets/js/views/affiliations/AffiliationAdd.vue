<template>
   <affiliation_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Affiliation</b-alert>
   </affiliation_form>
</template>

<script>

import Errors from '../../core/errors'

import affiliation_form from '../templates/AffiliationForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '',
        url: '',        
        body: '',
        img:''
     },     
     
     errors: new Errors(),        
    }
  },

 components: { affiliation_form },

 methods: {     

    saveForm() {          
        axios.post('/api/affiliations/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
  },

  onSuccess(response) {
     this.$router.replace('/affiliations'); 
  }

}   
  
</script>
