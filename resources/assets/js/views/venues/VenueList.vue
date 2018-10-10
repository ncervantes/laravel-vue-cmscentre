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
        { key: 'title', label: 'Venue Name', sortable: true, sortDirection: 'desc' },
        { key: 'address', label: 'Address', sortable: true, 'class': 'text-center' }, 
        { key: 'city', label: 'City', sortable: true, 'class': 'text-center' },
        { key: 'province', label: 'Province', sortable: true, 'class': 'text-center' },
        { key: 'postal', label: 'Postal', sortable: true, 'class': 'text-center' },              
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showVenue",
      editAction: "editVenue",
      addAction:  "addVenue",
      deleteAction: "deleteVenue"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/venues')
             .then(function(resp) { 
                app.all_items = resp.data.venues;              
                console.log(resp.data.venues);                
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