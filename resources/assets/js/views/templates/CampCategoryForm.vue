<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Name:"
                    label-for="titleInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
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

     changeFile(e) {
        console.log(e.target.files[0]);

        var fileReader = new FileReader()

        fileReader.readAsDataURL(e.target.files[0])

        fileReader.onload = (e) => {           
            this.items.path_image = e.target.result
        }        
    }, 
    
  },  
 
}   
  
</script>