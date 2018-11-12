<template>
  <deleteitem :table="table" :id="id" :title="title" :listTable="listTable">
    <b-alert show variant="info">Delete Venue</b-alert>
  </deleteitem>
</template>
<script>
  import deleteitem from '../templates/DeleteItem.vue'
  export default {

    data() {
       return {
          table: "venues",
          id: this.$route.params.id,
          title: this.$route.params.title,
          listTable: "listVenue"
       }
    },

    components: { deleteitem }

  }
</script>