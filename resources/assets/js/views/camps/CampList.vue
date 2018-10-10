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
        { key: 'title', label: 'Camp Name', sortable: true, sortDirection: 'desc' },
        { key: 'categories.title', label: 'Category', sortable: true, 'class': 'text-center' }, 
        { key: 'section', label: 'Section', sortable: true, 'class': 'text-center' },  
        { key: 'min_age', label: 'Minimun Age', sortable: true, 'class': 'text-center' }, 
        { key: 'max_age', label: 'Maximun Age', sortable: true, 'class': 'text-center' },
        { key: 'start_date', label: 'Start Date', sortable: true, 'class': 'text-center' },  
        { key: 'end_date', label: 'End Date', sortable: true, 'class': 'text-center' }, 
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showCamp",
      editAction: "editCamp",
      addAction: "addCamp",
      deleteAction: "deleteCamp"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/camps')
             .then(function(resp) { 
                app.all_items = resp.data.camps;              
                console.log(resp.data.camps);                
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