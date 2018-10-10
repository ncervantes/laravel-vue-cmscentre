<template>
  <div>
    <slot></slot>
    <b-form @submit.prevent ="deleteItem">
      <slot></slot>
      <h3>ccgfcfgf</h3>
      <p>The action cannot be undone</p>
      <b-button type="submit" variant="primary">Delete</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
  </div>
</template>
<script>
  export default {

    props: [ "table", "id" ],

    data () {
          return {      
            items: '',
          }
    },

    methods: { 

      fetchData(){
          let app = this;
          axios.get('/api/' + this.table + '/' + this.id)
               .then(function(resp) { 
                  app.items = resp.data;              
                  console.log(resp.data);                
               })
               .catch(function(resp) {
                  console.log(resp);                
               });
      },

      deleteItem() {
          axios.delete('/api/affiliations/' + this.id)
               .then((response)=> {
                   this.$router.push({name:'listAffiliation'})
               });
      } 
    },

    mounted() {    
      this.fetchData();    
    },
     
  }
</script>