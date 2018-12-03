<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Page Menu</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/PageMenuForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '', 
        index: [0,0,0,0],
        showAfter: 0,
        pageTemplate: 'Camps',       
     },     
     
     errors: new Errors(),
            
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {      
        axios.post('/api/page-menus/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
      this.$router.replace('/page-menus'); 
    }    
    
  },

}   
  
</script>
