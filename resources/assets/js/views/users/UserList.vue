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
        { key: 'username', label: 'User Name', sortable: true, sortDirection: 'desc' }, 
        { key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },                      
        { key: 'actions', label: 'Actions'}
      ],
      showAction: "showUser",
      editAction: "editUser",
      addAction: "addUser",
      deleteAction: "deleteUser"
    }
  },

  components: {
     'list-template': listtemplate
  },
   
  
  methods: { 

    fetchData(){
        let app = this;
        axios.get('/api/users')
             .then(function(resp) { 
                app.all_items = resp.data.users;
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