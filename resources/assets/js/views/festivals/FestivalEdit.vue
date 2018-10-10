<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Festivals</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import table_form from '../templates/FestivalForm.vue'

export default {
  
  data () {
    return {
     
     items:{    
        title:'',    
        affiliation_id: null,        
        section: '',         
        listingblurb:'',
        longblurb:'',
        pagination: 0,
        path_thumbnail:'',
        path_main:''       
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/festivals/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;                            
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
        });
    },   

    saveForm() {         
        axios.put('/api/festivals/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));        
    },    

    
    onSuccess() { 
       this.$router.replace('/festivals');
    }
  },
 
  created() {    
    this.fetchData();    
  },   
    
}   
  
</script>


