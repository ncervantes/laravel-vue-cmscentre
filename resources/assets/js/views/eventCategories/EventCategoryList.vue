<template>
  <list-template :items = "all_items" :fields = "all_fields" :showAction = "showAction" :editAction = "editAction" :addAction="addAction" :deleteAction="deleteAction"></list-template>
</template>

<script>

import listtemplate from '../templates/ListTemplate.vue';

export default {
  

  data () {
    return {
       all_items: [],
       all_fields: [
        { key: 'title', label: 'Category Name', sortable: true, sortDirection: 'desc' },                    
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showEventCategory",
      editAction: "editEventCategory",
      addAction: "addEventCategory",
      deleteAction: "deleteEventCategory"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/eventcategories')
             .then(function(resp) { 
                app.all_items = resp.data.eventcategories;              
                console.log(resp.data.eventcategories);                
             })
             .catch(function(resp) {
                console.log(resp.data);                
             });
    },
  },

  created() {
     this.fetchData();
  }

}
</script>

<!-- table-complete-1.vue -->