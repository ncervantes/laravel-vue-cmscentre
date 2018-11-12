<template>
  <deleteitem :table="table" :id="id" :title="title" :listTable="listTable">
    <b-alert show variant="info">Delete Affiliation</b-alert>
  </deleteitem>
</template>
<script>
  import deleteitem from '../templates/DeleteItem.vue'
  export default {

    data() {
       return {
          table: "page-templates",
          id: this.$route.params.id,
          title: this.$route.params.title,
          listTable: "listPageTemplate"
       }
    },

    components: { deleteitem }

  }
</script>