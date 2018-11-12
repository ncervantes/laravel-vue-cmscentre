<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Affiliation Name:"
                    label-for="affiliationtitleInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Event Category Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group>  
      
      <b-form-group id="bodyInputGroup"
                    label="Description:"
                    label-for="eventCategoryBodyInput">
        
        <vue-ckeditor  v-model="items.description"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.description)" v-text="errors.get('description')"></span>
      </b-form-group> 

      <b-form-group>
        <b-form-checkbox-group id="disciplines" name="disciplines" v-model="items.selected" :options="options">
        </b-form-checkbox-group>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      
    </b-form>
  </div>
</template>


<script>
import VueCkeditor from 'vue-ckeditor2';

export default {
  
  props: ["items", "errors"],

  components: {VueCkeditor},

  data() {
     return {        
        options: [],
        all_items: []
     }
  },

  methods: {
     hasField(field) { 
        return (field === '');
     },
    
  }, 

  
 
}   
  
</script>