<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Festivals Name:"
                    label-for="festivalnameInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Festivals Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 

      <div>
        <p>Affiliation:</p>
        <b-form-select v-model="items.affiliation_id" :options="options" class="mb-3" />
      </div>  
      
      <div>
        <p>Section:</p>
        <b-form-select v-model="items.section" :options="sectionOptions" class="mb-3" />
      </div> 

      <b-form-group id="paginationGroup"
                    label="Pagination:"
                    label-for="pagination">  
        <b-form-checkbox id="pagination"
                       v-model="items.pagination"
                       value=1
                       unchecked-value=0>      
        </b-form-checkbox>
      </b-form-group> 

      <div>
        <p>Thumbnail:</p>
        <b-form-file v-model="items.path_thumbnail" :state="Boolean(items.path_thumbnail)" @change="changeFile($event, 'thumbnail')" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
        <b-img :src="items.path_thumbnail"/> 
      </div> 

      <div>
        <p>Main:</p>
        <b-form-file v-model="items.path_main" :state="Boolean(items.path_main)" @change="changeFile($event, 'main')" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
        <b-img :src="items.path_main"/> 
      </div>           

      <b-form-group id="bodyInputGroup"
                    label="Listing Blurb:"
                    label-for="festivalListingInput">
        
        <vue-ckeditor  v-model="items.listingblurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.listingblurb)" v-text="errors.get('listingblurb')"></span>
      </b-form-group>

      <b-form-group id="bodyInputGroup"
                    label="Long Blurb:"
                    label-for="festivalLongInput">
        
        <vue-ckeditor  v-model="items.longblurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.longblurb)" v-text="errors.get('longblurb')"></span>
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
      aff_items:[],        
      sectionOptions: [
        { value: 'Summer Festivals', text: 'Summer Festivals' },
        { value: 'Autumn Festivals', text: 'Fall Festivals' },
        { value: 'Winter Festivals', text: 'Winter Festivals' },        
        { value: 'Spring Festivals', text: 'Spring Festivals' }, 
      ],
              
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
          if(srcImage == "thumbnail") { 
            this.items.path_thumbnail = e.target.result            
          } else {
             this.items.path_main = e.target.result 
          }
        }
        console.log(this.items.path_thumbnail);
    },    

    fetchAffiliation(){
        let app = this;
        axios.get('/api/affiliations')
             .then(function(resp) { 
                app.aff_items = resp.data.affiliations;              
                
                for(var i=0; i < app.aff_items.length; i++) { 
                  app.options.push( 
                    {
                       value: app.aff_items[i].id,
                       text: app.aff_items[i].title
                    });
                                    
                }                 
                         
             })
             .catch(function(resp) {
                console.log(resp.data);                
        });
    }    
    
  },

  created() {
    this.fetchAffiliation();    
  }
 
}   
  
</script>