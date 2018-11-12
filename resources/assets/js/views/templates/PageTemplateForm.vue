<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Page Template Title:"
                    label-for="pageTemplatetitleInput">
        <b-form-input id="pageTemplateTitleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Page Template Title">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group>

      <p>Page Detail:</p>
      <b-form-textarea id="textarea1"
                     v-model="items.detail"
                     placeholder="Enter Page Detail"
                     :rows="3"
                     :max-rows="6">
      </b-form-textarea>     

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