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
        { key: 'title', label: 'Festival Name', sortable: true, sortDirection: 'desc' },
        { key: 'affiliations.title', label: 'Affiliation', sortable: true, 'class': 'text-center' }, 
        { key: 'section', label: 'Section', sortable: true, 'class': 'text-center' },  
        { key: 'pagination', label: 'Disable Pagination', sortable: true, 'class': 'text-center' },            
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showFestival",
      editAction: "editFestival",
      addAction: "addFestival",
      deleteAction: "deleteFestival",
      
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/festivals')
             .then(function(resp) { 
                app.all_items = resp.data.festivals;
                console.log(resp.data.festivals);                
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