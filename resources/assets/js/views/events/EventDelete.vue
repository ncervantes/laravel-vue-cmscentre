<template>
  <deleteitem :table="table" :id="id" :title="title" :listTable="listTable">
    <b-alert show variant="info">Delete Event</b-alert>
  </deleteitem>
</template>
<script>
  import deleteitem from '../templates/DeleteItem.vue'
  export default {

    data() {
       return {
          table: "events",
          id: this.$route.params.id,
          title: this.$route.params.title,
          listTable: "listEvent"
       }
    },

    components: { deleteitem }

  }
</script>