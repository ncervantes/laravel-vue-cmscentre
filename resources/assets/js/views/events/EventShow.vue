<template>
  <div>
    <b-alert show>Event</b-alert> 
     <b-form @submit.prevent="backToList">
       <p>Event Name: {{items.title}}</p>  
       <ul>         
           <li>Affiliation: {{items.affiliations.title}}</li>
           <li>Festival: {{items.festivals.title}}</li>           
           <li>Listing Blurb: {{items.listingblurb}}</li>
           <li>Long Blurb: {{items.longblurb}}</li>
           <li>Short Blurb: {{items.shortblurb}}</li>
           <li>Tickets URL: {{items.ticketsURL}}</li>
           <li>Directions URL: {{items.directionsURL}}</li>
           <li>Price: {{items.price}}</li>
           <li>Event Thumbnail: <img :src="items.thumbnail_path"></li>
           <li>Event Main: <img :src="items.main_path"></li>
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
        festivals: {
           title:''
        },        
        shortblurb: '',         
        listingblurb:'',
        longblurb:'',
        ticketsURL: '',
        directionsURL: '',
        prices: 0,
        thumbnail_path:'',
        main_path:''
     },
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/events/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/events');
    }  
  },
  

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>