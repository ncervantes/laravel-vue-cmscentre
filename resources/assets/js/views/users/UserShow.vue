<template>
  <div>
 
     <b-form @submit.prevent="backToList">
      <ul>         
          <li>UserName: {{items.username}}</li>  
          <li>Full Name: {{items.name}}</li> 
          <li>Email: {{items.email}}</li>
          <li>Company: {{items.company}}</li>   
          <li>Phone: {{items.phone}}</li>
      </ul>
      <p> Groups: </p>
      <ul>         
          <li v-for="selected in items.selected">{{selected.title}}</li> 
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
        axios.get('/api/users/' + this.$route.params.id)
             .then(function(resp) { 
                app.items = resp.data;              
                console.log(resp.data);                
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