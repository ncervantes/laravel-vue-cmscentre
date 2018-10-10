<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Venue</b-alert>
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

    fetchData(){
        let app = this;
        axios.get('/api/venues/' + this.$route.params.id + '/edit')
             .then(function(resp) { console.log(resp);
                app.items = resp.data;                                       
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },   

    saveForm() {         
        axios.put('/api/venues/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/venues');
    }
  },
 
  mounted() {    
    this.fetchData();    
  },


   
    
}   
  
</script>


