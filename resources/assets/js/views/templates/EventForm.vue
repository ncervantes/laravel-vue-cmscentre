<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Events Name:"
                    label-for="evebtnameInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Events Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 

      <div>
        <p>Affiliation:</p>
        <b-form-select v-model="items.affiliation_id" :options="options" class="mb-3" />
      </div> 

      <div>
        <p>Festival:</p>
        <b-form-select v-model="items.festival_id" :options="festivaloptions" class="mb-3" />
      </div>       
      
      <div>
        <p>Thumbnail:</p>
        <b-form-file v-model="items.thumbnail_path" :state="Boolean(items.thumbnail_path)" @change="changeFile($event, 'thumbnail')" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
        <b-img :src="items.thumbnail_path"/> 
      </div> 

      <div>
        <p>Main:</p>
        <b-form-file v-model="items.main_path" :state="Boolean(items.main_path)" @change="changeFile($event, 'main')" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
        <b-img :src="items.main_path"/> 
      </div>  

      <b-form-group id="ticketsURLInputGroup"
                    label="Tickets URL:"
                    label-for="ticketsURLInput">
        <b-form-input id="ticketsURLInput"
                      type="text"
                      v-model="items.ticketsURL"                                           
                      placeholder="Enter Events Tickets URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.ticketsURL)" v-text="errors.get('ticketsURL')"></span>
      </b-form-group>  

      <b-form-group id="directionsURLInputGroup"
                    label="Directions URL:"
                    label-for="directionsURLInput">
        <b-form-input id="directionsURLInput"
                      type="text"
                      v-model="items.directionsURL"                                           
                      placeholder="Enter Events Directions URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.directionsURL)" v-text="errors.get('directionsURL')"></span>
      </b-form-group>        

      <p>Listing Blurb:</p>
      <b-form-textarea id="textarea1"
                     v-model="items.listingblurb"
                     placeholder="Enter Listing Blurb"
                     :rows="3"
                     :max-rows="6">
      </b-form-textarea>

      <b-form-group id="shortInputGroup"
                    label="Short Blurb:"
                    label-for="eventShortInput">
        
        <vue-ckeditor  v-model="items.shortblurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.shortblurb)" v-text="errors.get('shortblurb')"></span>
      </b-form-group>

      <b-form-group id="longInputGroup"
                    label="Long Blurb:"
                    label-for="eventLongInput">
        
        <vue-ckeditor  v-model="items.longblurb"></vue-ckeditor>
        <span class="help is-danger" v-if="hasField(items.longblurb)" v-text="errors.get('longblurb')"></span>
      </b-form-group>

      <b-form-group>
        <b-form-checkbox-group id="disciplines" name="disciplines" v-model="items.selected" :options="disciplineoptions">
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

  data () {
    return {       
      options: [],
      festivaloptions: [],
      disciplineoptions: [],
      aff_items: [],
      fest_items: [], 
      disc_items: []
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
            this.items.thumbnail_path = e.target.result            
          } else {
             this.items.main_path = e.target.result 
          }
        }
        console.log(this.items.thumbnail_path);
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
    },

    fetchFestival(){
        let app = this;
        axios.get('/api/festivals')
             .then(function(resp) { 
                app.fest_items = resp.data.festivals;              
                
                for(var i=0; i < app.fest_items.length; i++) { 
                  app.festivaloptions.push( 
                    {
                       value: app.fest_items[i].id,
                       text: app.fest_items[i].title
                    });
                                    
                }                 
                         
             })
             .catch(function(resp) {
                console.log(resp.data);                
        });
    },

    fetchDiscipline(){
        let app = this;
        axios.get('/api/disciplines')
             .then(function(resp) { 
                app.disc_items = resp.data.disciplines;              
                
                for(var i=0; i < app.disc_items.length; i++) { 
                  app.disciplineoptions.push( 
                    {
                       value: app.disc_items[i].id,
                       text: app.disc_items[i].title
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
    this.fetchFestival(); 
    this.fetchDiscipline();   
  }
 
}   
  
</script>