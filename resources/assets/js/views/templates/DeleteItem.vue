<template>
  <div>
    <slot></slot>
    <b-form @submit.prevent ="deleteItem">      
      <h3>{{title}}</h3>
      <p>The action cannot be undone</p>
      <b-button type="submit" variant="primary">Delete</b-button>
      <b-button type="reset" variant="danger">Cancel</b-button>
    </b-form>
  </div>
</template>
<script>
  export default {

    props: [ "table", "id", "title", "listTable" ],

    data () {
          return {      
            items: '',
          }
    },

    methods: {

      deleteItem() {
          axios.delete('/api/' + this.table + '/' + this.id)
               .then((response)=> {
                   this.$router.push({name: this.listTable})
               });
      } 
    }
     
  }
</script>