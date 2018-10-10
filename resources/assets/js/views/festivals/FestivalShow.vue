<template>
  <div>
    <b-alert show>{{items.title}}</b-alert>   
 
     <b-form @submit.prevent="backToList">
       <ul>         
           <li>Affiliation: {{items.affiliations.title}}</li>
           <li>Section: {{items.section}}</li>
           <li>Listing Blurb: {{items.listingblurb}}</li>
           <li>Long Blurb: {{items.longblurb}}</li>
           <li>pagination: {{items.pagination}}</li>
           <li>Affiliation Thumbnail: <img :src="items.path_thumbnail"></li>
           <li>Affiliation Main: <img :src="items.path_main"></li>
       </ul>
     <b-button type="submit" variant="primary">OK</b-button>
     </b-form>
     
  </div>

</template>

<script>

export default {
  

  data () {
    return {      
      items:{    
        title:'',    
        affiliations: {
           title:''
        },        
        section: '',         
        listingblurb:'',
        longblurb:'',
        pagination: 0,
     },
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/festivals/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/festivals');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>