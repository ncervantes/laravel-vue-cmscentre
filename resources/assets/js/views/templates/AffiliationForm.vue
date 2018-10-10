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
                      placeholder="Enter Affiliation Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 
      <b-form-group id="urlAddressInputGroup"
                    label="Affiliation URL:"
                    label-for="affiliationUrlInput">
        <b-form-input id="urlInput"
                      type="text"
                      v-model="items.url"                      
                      placeholder="Enter Url Address">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.url)" v-text="errors.get('url')"></span>
      </b-form-group>
      
      <b-form-file v-model="items.path_image" :state="Boolean(items.path_image)" @change="changeFile" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
      <b-img :src="items.path_image"/> 
      
      <b-form-group id="bodyInputGroup"
                    label="Description:"
                    label-for="affiliationBodyInput">
        
        <vue-ckeditor  v-model="items.body"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.body)" v-text="errors.get('body')"></span>
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