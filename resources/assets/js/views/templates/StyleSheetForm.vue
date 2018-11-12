<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="StyleSheet Title:"
                    label-for="stylesheettitleInput">
        <b-form-input id="stylesheetTitleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter StyleSheet Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      
    </b-form>
  </div>
</template>


<script>

export default {
  
  props: ["items", "errors"],

  methods: {
     hasField(field) { 
        return (field === '');
     }
  },  
 
}   
  
</script>