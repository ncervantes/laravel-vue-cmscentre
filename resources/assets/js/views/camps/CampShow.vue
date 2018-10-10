<template>
  <div>

     <b-alert show>Camp</b-alert>        
 
     <b-form @submit.prevent="backToList">
		 <ul> 
		     <li>Camp Name: {{items.title}}</li>        
		     <li>Category: {{items.categories.title}}</li>
		     <li>Section: {{items.section}}</li>         
		     <li>Listing Blurb: {{items.listing_blurb}}</li>
		     <li>Short Blurb: {{items.short_blurb}}</li>
		     <li>Main Image: <img :src="items.main_image"></li>
		     <li>Minimun Age: {{items.min_age}}</li>
		     <li>Maximun Age: {{items.max_age}}</li>
		     <li>Start Date: {{items.start_date}}</li>
		     <li>End Date: {{items.end_date}}</li>
		     <li>Registration URL: {{items.registration_url}}</li>
		     <li>Form URL: {{items.forms_url}}</li>
		     <li>Camp Site Map URL: {{items.camp_site_map_url}}</li>
		 </ul>
	     <b-button type="submit" variant="primary">OK</b-button>
     </b-form>
     
  </div>

</template>

<script>

export default { 

    data () {
    return {      
      items: {
         categories: {
            title:''
         }
      },
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/camps/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/camps');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  }, 
}        
  
</script>

