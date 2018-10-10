<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Discipline Name:"
                    label-for="disciplinetitleInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Discipline Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 
      <b-form-group id="displayFilterGroup"
                    label="Display Filter on Menu:"
                    label-for="display_filter">  
        <b-form-checkbox id="displayFilter"
                       v-model="items.display_filter"
                       value=1
                       unchecked-value=0>      
        </b-form-checkbox>
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

  methods: {
     hasField(field) { 
        return (field === '');
     },
    
  },  
 
}   
  
</script>