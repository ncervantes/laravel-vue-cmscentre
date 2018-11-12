<template>
   <table_form :items="items" :errors="errors" @saveData="saveForm" :options="options" :listoptions="listoptions">
     <b-alert show variant="info">Create New Group</b-alert>
   </table_form>
</template>

<script>

import Errors from '../../core/errors'

import table_form from '../templates/GroupForm.vue'

export default {
  
  data () {
    return {
      
     items:{
       title: '',
       selected:[],
     }, 

     all_items:[],
      
     options: [],  
     listoptions: [],  
     
     errors: new Errors(),
            
    }
  },

 components: { table_form },

 methods: {     

    saveForm(list) {  
        var listRetrieve = document.getElementById(list);
        if (listRetrieve.options.length>0) {
          for(var i = 0; i < listRetrieve.options.length; ++i){          
            this.items.selected[i] = listRetrieve.options[i].value;
          } 
        }
        
        axios.post('/api/groups/', this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },

    onSuccess() { 
      this.$router.replace('/groups'); 
    },

    fetchUsers(){
        let app = this;
        axios.get('/api/users')
             .then(function(resp) { 
                app.all_items = resp.data.users;              
                
                if (app.all_items.length > 0) {
                  for(var i=0; i < app.all_items.length; i++) { 
                    app.options.push( 
                      {
                         value: app.all_items[i].id,
                         text: app.all_items[i].name
                      });           
                  }                 
                }          
             })
             .catch(function(resp) {
                console.log(resp.data);                
        });
    },   
    
  },
  
  created() {
     this.fetchUsers()
  }

}   
  
</script>
