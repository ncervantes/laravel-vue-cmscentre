<template>
  <div>
 
     <b-form @submit.prevent="backToList">
       <p>Group Name: {{items.title}}</p>
       <p>Users Selected: </p>
       <ul>         
          <li v-for="selected in items.selected">{{selected.name}}</li> 
       </ul>
       <b-button type="submit" variant="primary">OK</b-button>
     </b-form>
     
  </div>

</template>

<script>

export default {
  

  data () {
    return {      
      items: '',
    }
  },

  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/groups/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data; 
             })
             .catch(function(resp) {
                console.log(resp);                
             });
    },

    backToList() {
       this.$router.replace('/groups');
    } 
  },
  

  mounted() {    
    this.fetchData();    
  },
}   
  
</script>