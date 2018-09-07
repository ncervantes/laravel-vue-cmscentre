<template>
   <affiliation_form :items="items" :formname="formname" :errors="errors" @saveData="saveForm" @changeFile="changeFile"></affiliation_form>
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
        image:''
     },
     
     formname: 'Create New Affiliation',
     errors: new Errors(),        
    }
  },

 components: { affiliation_form },

 methods: {     

    saveForm() { 
        var newAffiliation = this.items; 
        axios.post('/api/affiliations/', newAffiliation)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    changeFile(e) {
        console.log(e.target.files[0]);

        var fileReader = new FileReader()

        fileReader.readAsDataURL(e.target.files[0])

        fileReader.onload = (e) => {
            this.items.image = e.target.result
        }
        console.log(this.items);
    }
    
  },

  onSuccess(response) {
     this.$router.replace('/affiliations'); 
  }

}   
  
</script>
