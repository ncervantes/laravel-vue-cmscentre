<template>
  <deleteitem :table="table" :id="id" :title="title" :listTable="listTable">
    <b-alert show variant="info">Delete Group</b-alert>
  </deleteitem>
</template>
<script>
  import deleteitem from '../templates/DeleteItem.vue'
  export default {

    data() {
       return {
          table: "groups",
          id: this.$route.params.id,
          title: this.$route.params.title,
          listTable: "listGroup"
       }
    },

    components: { deleteitem }

  }
</script>