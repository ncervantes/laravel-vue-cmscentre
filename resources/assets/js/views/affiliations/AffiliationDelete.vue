<template>
  <deleteitem :table="table" :id="id">
    <b-alert show variant="info">Delete Affiliation</b-alert>
  </deleteitem>
</template>
<script>
  import deleteitem from '../templates/DeleteItem.vue'
  export default {

    data() {
       return {
          table: "affiliations",
          id: this.$route.params.id
       }
    },

    components: { deleteitem }

  }
</script>