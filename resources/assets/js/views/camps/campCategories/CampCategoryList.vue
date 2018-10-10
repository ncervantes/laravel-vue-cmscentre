<template>
  <list-template :items = "all_items" :fields = "all_fields" :showAction = "showAction" :editAction = "editAction" :addAction="addAction" :deleteAction="deleteAction"></list-template>
</template>

<script>

import listtemplate from '../../templates/ListTemplate.vue';

export default {
  

  data () {
    return {
       all_items: [],
       all_fields: [
        { key: 'title', label: 'Category Name', sortable: true, sortDirection: 'desc' },                    
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showCampCategory",
      editAction: "editCampCategory",
      addAction: "addCampCategory",
      deleteAction: "deleteCampCategory"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/camp-categories')
             .then(function(resp) { 
                app.all_items = resp.data.campcategories;              
                console.log(resp.data.campcategories);                
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