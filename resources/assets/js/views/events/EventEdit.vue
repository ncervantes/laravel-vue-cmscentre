<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Event</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import table_form from '../templates/EventForm.vue'

export default {
  
  data () {
    return {
     
     items:{    
        title:'',    
        affiliation_id: null,
        festival_id: null,         
        shortblurb: '',         
        listingblurb:'',
        longblurb:'',
        ticketsURL: '',
        directionsURL: '',
        prices: 0,
        thumbnail_path:'',
        main_path:'',
        selected: []        
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/events/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;                            
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
        });
    },   

    saveForm() {         
        axios.put('/api/events/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));        
    },    

    
    onSuccess() { 
       this.$router.replace('/events');
    }
  },
 
  created() {    
    this.fetchData();    
  },   
    
}   
  
</script>


