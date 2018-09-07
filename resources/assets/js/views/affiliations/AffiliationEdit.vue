<template>
   <affiliation_form :items="items" :formname="formname" :errors="errors" @saveData="saveForm"></affiliation_form>
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
        logo: '',
        body: ''
     },
     path:'',
     formname: 'Edit Affiliation',
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
        var newAffiliation = this.items; 
        axios.put('/api/affiliations/'+ this.$route.params.id, newAffiliation)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    }       

  },
 
  mounted() {    
    this.fetchAffiliation();    
  },
   
    
}   
  
</script>


