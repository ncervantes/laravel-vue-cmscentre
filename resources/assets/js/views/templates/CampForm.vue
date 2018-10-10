<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Camp Name:"
                    label-for="campnameInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Camp Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 

      <div>
        <p>Category:</p>
        <b-form-select v-model="items.category_id" :options="options" class="mb-3" />
      </div>  
      
      <div>
        <p>Section:</p>
        <b-form-select v-model="items.section" :options="sectionOptions" class="mb-3" />
      </div>

      <b-form-group id="maxAgeInputGroup"
                    label="Maximun Age:"
                    label-for="maximunAgeInput">
        <b-form-input id="maxAgeInput"
                      type="number"
                      v-model="items.max_age">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.max_age)" v-text="errors.get('max_age')"></span>
      </b-form-group>

      <b-form-group id="minAgeInputGroup"
                    label="Minimun Age:"
                    label-for="minimunAgeInput">
        <b-form-input id="minAgeInput"
                      type="number"
                      v-model="items.min_age">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.min_age)" v-text="errors.get('min_age')"></span>
      </b-form-group>  

      <div>        
          <p><label :for="`type-${type}`">Start Date:</label></p>
          <p><b-form-input :id="`type-${type}`" v-model="items.start_date" :type="type"></b-form-input></p>        
      </div> 

      <div>        
          <p><label :for="`type-${type}`">End Date:</label></p>
          <p><b-form-input :id="`type-${type}`" :type="type" v-model="items.end_date"></b-form-input></p>        
      </div>  

      <div>
        <p>Main Image:</p>
        <b-form-file v-model="items.main_image" :state="Boolean(items.main_image)" @change="changeFile($event, 'main')" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
        <b-img :src="items.main_image"/> 
      </div>   

      <b-form-group id="registrationURLInputGroup"
                    label="Registration URL:"
                    label-for="registrationurlInput">
        <b-form-input id="registrationUrlInput"
                      type="text"
                      v-model="items.registration_url"                                           
                      placeholder="Enter Registration URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.registration_url)" v-text="errors.get('registration_url')"></span>
      </b-form-group>  

      <b-form-group id="formURLInputGroup"
                    label="Form URL:"
                    label-for="formurlInput">
        <b-form-input id="formUrlInput"
                      type="text"
                      v-model="items.forms_url"                                           
                      placeholder="Enter Form URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.forms_url)" v-text="errors.get('forms_url')"></span>
      </b-form-group>

      <b-form-group id="campSiteInputGroup"
                    label="Camp Site Map URL:"
                    label-for="campsiteInput">
        <b-form-input id="formUrlInput"
                      type="text"
                      v-model="items.camp_site_map_url"                                           
                      placeholder="Enter Camp Site Map URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.camp_site_map_url)" v-text="errors.get('camp_site_map_url')"></span>
      </b-form-group>

      <b-form-group id="bodyInputGroup"
                    label="Listing Blurb:"
                    label-for="festivalListingInput">
        <b-form-textarea id="listingBlurb"
                       v-model="items.listing_blurb"                     
                       :rows="3"
                       :max-rows="6">
        </b-form-textarea> 
      </b-form-group>     

      <b-form-group id="bodyInputGroup"
                    label="Short Blurb:"
                    label-for="shortBlurbInput">
        
        <vue-ckeditor  v-model="items.short_blurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.short_blurb)" v-text="errors.get('short_blurb')"></span>
      </b-form-group>

      <b-form-group id="bodyInputGroup"
                    label="Long Blurb:"
                    label-for="festivalLongInput">
        
        <vue-ckeditor  v-model="items.long_blurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.long_blurb)" v-text="errors.get('long_blurb')"></span>
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

  data () {
    return {       
      options: [],
      all_items:[],        
      sectionOptions: [
        { value: 'Summer Camps', text: 'Summer Camps' },
        { value: 'Winter Camps', text: 'Winter Camps' },
        { value: 'March Breaks', text: 'March Breaks' },        
        { value: 'PD days', text: 'PD days' }, 
      ],
        type:'date'
            
    }
  },

  methods: {
     hasField(field) { 
        return (field === '');
     },

     changeFile(e, srcImage) {
        console.log(e.target.files[0]);

        var fileReader = new FileReader()

        fileReader.readAsDataURL(e.target.files[0])

        fileReader.onload = (e) => {          
             this.items.main_image = e.target.result 
          
        }
        console.log(this.items.main_image);
    },    

    fetchData(){
        let app = this;
        axios.get('/api/camp-categories')
             .then(function(resp) { 
                app.all_items = resp.data.campcategories;              
                
                for(var i=0; i < app.all_items.length; i++) { 
                  app.options.push( 
                    {
                       value: app.all_items[i].id,
                       text: app.all_items[i].title
                    });
                                    
                }                 
                         
             })
             .catch(function(resp) {
                console.log(resp.data);                
        });
    }    
    
  },

  created() {
    this.fetchData();    
  }
 
}   
  
</script>