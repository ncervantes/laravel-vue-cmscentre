<template>  
  <b-container fluid>
    <!-- User Interface controls -->
    <b-row>
      <b-col md="6" class="my-1">
        <b-button size="sm" class="mr-1" variant="primary">
          <router-link :to="{ name: addAction}">Create New </router-link>
        </b-button>
      </b-col>    
    </b-row>
  </b-container>
</template>

<script>

  export default {
    data () {
      return {            
         addAction: 'addCropImage'     
      }
    },
  }
</script>
