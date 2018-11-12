<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Venue Name:"
                    label-for="venuetitleInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Venue Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group>       
      
      <b-form-file v-model="items.logo" :state="Boolean(items.logo)" @change="changeFile" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
      <b-img :src="items.logo"/> 

      <b-form-group id="addressInputGroup"
                    label="Venue Address:"
                    label-for="venueAddressInput">
        <b-form-input id="addressInput"
                      type="text"
                      v-model="items.address"                      
                      placeholder="Enter Address">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.address)" v-text="errors.get('address')"></span>
      </b-form-group>

      <b-form-group id="cityInputGroup"
                    label="Venue City:"
                    label-for="venueCityInput">
        <b-form-input id="cityInput"
                      type="text"
                      v-model="items.city"                      
                      placeholder="Enter City">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.city)" v-text="errors.get('city')"></span>
      </b-form-group>

      <b-form-group id="provinceInputGroup"
                    label="Venue Province:"
                    label-for="venueProvinceInput">
        <b-form-input id="provinceInput"
                      type="text"
                      v-model="items.province"                      
                      placeholder="Enter Province">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.province)" v-text="errors.get('province')"></span>
      </b-form-group>
      
      <b-form-group id="postalInputGroup"
                    label="Venue Postal:"
                    label-for="venuePostalInput">
        <b-form-input id="postalInput"
                      type="text"
                      v-model="items.postal"                      
                      placeholder="Enter Postal">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.postal)" v-text="errors.get('postal')"></span>
      </b-form-group>

      <b-form-group id="urlInputGroup"
                    label="Venue URL:"
                    label-for="venueUrlInput">
        <b-form-input id="urlInput"
                      type="text"
                      v-model="items.url"                      
                      placeholder="Enter URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.url)" v-text="errors.get('url')"></span>
      </b-form-group>

      <b-form-group id="mapUrlInputGroup"
                    label="Venue Map URL:"
                    label-for="venueMapUrlInput">
        <b-form-input id="mapUrlInput"
                      type="text"
                      v-model="items.map_url"                      
                      placeholder="Enter URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.map_url)" v-text="errors.get('map_url')"></span>
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