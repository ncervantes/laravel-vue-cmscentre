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
        { key: 'title', label: 'Page Template Title', sortable: true, sortDirection: 'desc' },                     
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showStyleSheet",
      editAction: "editStyleSheet",
      addAction: "addStyleSheet",
      deleteAction: "deleteStyleSheet"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/style-sheets')
             .then(function(resp) { 
                app.all_items = resp.data.style_sheets;
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