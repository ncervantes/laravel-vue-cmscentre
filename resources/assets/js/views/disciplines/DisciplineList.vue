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
        { key: 'title', label: 'Discipline Name', sortable: true, sortDirection: 'desc' },
        { key: 'display_filter', label: 'Display on Filter Menu', sortable: true, 'class': 'text-center' },               
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showDiscipline",
      editAction: "editDiscipline",
      addAction:  "addDiscipline",
      deleteAction: "deleteDiscipline"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/disciplines')
             .then(function(resp) { 
                app.all_items = resp.data.disciplines;              
                console.log(resp.data.disciplines);                
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