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
        { key: 'title', label: 'Event Name', sortable: true, sortDirection: 'desc' },
        { key: 'affiliations.title', label: 'Affiliation', sortable: true, 'class': 'text-center' }, 
        { key: 'festival.title', label: 'Festival', sortable: true, 'class': 'text-center' },                     
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showEvent",
      editAction: "editEvent",
      addAction: "addEvent",
      deleteAction: "deleteEvent",
      
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/events')
             .then(function(resp) { 
                app.all_items = resp.data.events;
                console.log(resp.data.events);                
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