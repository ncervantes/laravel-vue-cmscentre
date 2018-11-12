<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm" :options="options" :listoptions="listoptions">
     <b-alert show variant="info">Update Group</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import Info from '../../core/info'

import table_form from '../templates/UserForm.vue'

export default {
  
  data () {
    return {
     
     items:{
        selected: [],
        unselected: []
     },

     options: [],
     listoptions: [],
     
     errors: new Errors(),    
     info: new Info(),

    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;

        axios.get('/api/users/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;   

                app.info.getOptions(resp.data['unselected'], app.options, 'unselected', 'groups'); 
                app.info.getOptions(resp.data['selected'], app.listoptions, 'selected', 'groups');                                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    }, 

    saveForm(list) {  
        var listRetrieve = document.getElementById(list); 
        this.items.selected = []; 
        if (listRetrieve.options.length > 0) {         
          for(var i = 0; i < listRetrieve.options.length; ++i){          
            this.items.selected[i] = listRetrieve.options[i].value; 
          } 
        }

        axios.put('/api/users/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/users');
    }
  },
 
  mounted() {    
    this.fetchData();    
  },
    
}   
  
</script>


