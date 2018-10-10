<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm" >
     <b-alert show variant="info">Create New Camp</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/CampForm.vue'

export default {
  
  data () {
    return {
      
     items:{    
        title:'',    
        category_id: null,        
        section: '',         
        listing_blurb:'',
        long_blurb:'',
        short_blurb:'',        
        main_image:'',
        max_age: 0,
        min_age:0,
        start_date:'',
        end_date:'',
        registration_url:'',
        forms_url:'',
        camp_site_map_url:''        
     },  
          
     errors: new Errors(),        
    }
  },

 components: { table_form },

 methods: {     

    saveForm() {       
        console.log(this.items);   
        axios.post('/api/camps/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
     this.$router.replace('/camps'); 
    }, 
    
  },
 

}   
  
</script>
