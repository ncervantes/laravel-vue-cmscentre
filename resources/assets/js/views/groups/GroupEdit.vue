<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm" :options="options" :listoptions="listoptions">
     <b-alert show variant="info">Update Group</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import Info from '../../core/info'

import table_form from '../templates/GroupForm.vue'

export default {
  
  data () {
    return {
     
     items:{
       title: '',
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
        axios.get('/api/groups/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data; console.log(resp.data); 

                if (resp.data['unselected']) {
                   app.info.getOptions(resp.data['unselected'], app.options, 'unselected', 'users'); 
                }

                if (resp.data['selected']) {
                   app.info.getOptions(resp.data['selected'], app.listoptions, 'selected', 'users');  
                }                 

             })
             .catch(function(resp) {
                console.log(resp);                
             });
    }, 
    
    saveForm(list) {     
        var listRetrieve = document.getElementById(list); 
        if (listRetrieve.options.length>0) {
          this.items.selected = [];
          for(var i = 0; i < listRetrieve.options.length; ++i){          
            this.items.selected[i] = listRetrieve.options[i].value; 
          } 
        }
        
        axios.put('/api/groups/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));
        
    },    
    
    onSuccess() { 
       this.$router.replace('/groups');
    }
  },
 
  created() {    
    this.fetchData();
  },
    
}   
  
</script>


