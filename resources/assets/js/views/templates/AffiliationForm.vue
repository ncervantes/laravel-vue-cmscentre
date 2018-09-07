<template>
 
  <div>
    <b-alert show variant="info">{{formname}}</b-alert>
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
      <!-- Styled -->
      <b-form-file v-model="filelogo" :state="Boolean(filelogo)" @change="$emit('changeFile', $event)" placeholder="Choose a file..."></b-form-file>
      <br/>
      <b-img v-if="$route.params.id" :src="'../images/affiliations/'+ $route.params.id + '.png'"/>
      
      <b-form-group id="bodyInputGroup"
                    label="Description:"
                    label-for="affiliationBodyInput">
        <b-form-textarea id="textarea1"
                     v-model="items.body"
                     placeholder="Enter Description"
                     :rows="3"
                     :max-rows="6">
        </b-form-textarea>
        <span class="help is-danger" v-if="hasField(items.body)" v-text="errors.get('body')"></span>
      </b-form-group>
      
      <b-button type="submit" variant="primary">Submit</b-button>
      
    </b-form>
  </div>
</template>


<script>

export default {
  
  props: ["items", "formname", "errors"],

  data () {
    return {
      filelogo: null,            
    }
  },

  methods: {
     hasField(field) { 
        return (field === '');
     },

  },

      
}   
  
</script>