<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Discipline</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import table_form from '../templates/DisciplineForm.vue'

export default {
  
  data () {
    return {
     
     items:{
       title: '',
       display_filter: '' 
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/disciplines/' + this.$route.params.id + '/edit')
             .then(function(resp) { console.log(resp);
                app.items = resp.data;                                       
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },   

    saveForm() {         
        axios.put('/api/disciplines/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/disciplines');
    }
  },
 
  mounted() {    
    this.fetchData();    
  },


   
    
}   
  
</script>


