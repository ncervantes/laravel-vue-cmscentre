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
        { key: 'title', label: 'Affiliation Name', sortable: true, sortDirection: 'desc' },
        { key: 'url', label: 'Affiliation URL', sortable: true, 'class': 'text-center' },               
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showAffiliation",
      editAction: "editAffiliation",
      addAction: "addAffiliation",
      deleteAction: "deleteAffiliation"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/affiliations')
             .then(function(resp) { 
                app.all_items = resp.data.affiliations;
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