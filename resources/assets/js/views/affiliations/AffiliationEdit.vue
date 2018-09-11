<template>
 <affiliation_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Affiliation</b-alert>
   </affiliation_form>
</template>

<script>
import Errors from '../../core/errors'

import affiliation_form from '../templates/AffiliationForm.vue'

export default {
  
  data () {
    return {

     image:'',  
     items:{
       title: '',
        url: '',
        img: '',
        body: ''
     },
     
     errors: new Errors(),     
    }
  },

  components: { affiliation_form },

 methods: { 

    fetchAffiliation(){
        let app = this;
        axios.get('/api/affiliations/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;                            
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },   

    saveForm() {         
        axios.put('/api/affiliations/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    

    hasField(field) { 
        return (field === '');
     }
  },
 
  mounted() {    
    this.fetchAffiliation();    
  },
   
    
}   
  
</script>


