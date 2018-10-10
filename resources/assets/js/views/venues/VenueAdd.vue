<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Create New Venue</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/VenueForm.vue'

export default {
  
  data () {
    return {
      
     items:{        
        title: '',
        address: '',        
        province: '',
        city:'',
        postal:'',
        logo:'',
        url:'',
        map_url:''
     },     
     
     errors: new Errors(),        
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {   console.log(this.items);     
        axios.post('/api/venues/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/venues'); 
  }    
    
  },

  

}   
  
</script>
