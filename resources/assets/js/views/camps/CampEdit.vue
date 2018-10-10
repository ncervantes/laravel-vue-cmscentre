<template>
 <table_form :items="items" :errors="errors" @saveData="saveForm">
     <b-alert show variant="info">Update Camps</b-alert>
   </table_form>
</template>

<script>
import Errors from '../../core/errors'

import table_form from '../templates/CampForm.vue'

export default {
  
  data () {
    return {
     
     items:{    
        title:'',    
        category_id: null,        
        section: '',         
        listing_blurb:'',
        long_blurb:'',
        short_blurb:'',        
        main_image:'',
        max_age: 0,
        min_age:0,
        start_date:'',
        end_date:'',
        registration_url:'',
        forms_url:'',
        camp_site_map_url:''       
     },
     
     errors: new Errors(),     
    }
  },

  components: { table_form },

 methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/camps/' + this.$route.params.id + '/edit')
             .then(function(resp) { 
                app.items = resp.data;                            
                console.log(resp.data);                               
             })
             .catch(function(resp) {
                console.log(resp);                
        });
    },   

    saveForm() {         
        axios.put('/api/camps/'+ this.$route.params.id, this.items)
           .then(this.onSuccess)
           .catch(error => this.errors.record(error.response.data.errors));        
    },    

    
    onSuccess() { 
       this.$router.replace('/camps');
    }
  },
 
  created() {    
    this.fetchData();    
  },   
    
}   
  
</script>


