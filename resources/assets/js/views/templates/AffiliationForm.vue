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
      
      <b-form-file v-model="image" :state="Boolean(image)" @change="changeFile" accept=".jpg, .png, .jpeg" placeholder="Choose a file..."></b-form-file>      
      <b-img :src="image"/> 
      
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
  
  props: ["items", "errors"],

  data () {
    return {
      image: null,                             
    }
  },

  methods: {
     hasField(field) { 
        return (field === '');
     },

     changeFile(e) {
        console.log(e.target.files[0]);

        var fileReader = new FileReader()

        fileReader.readAsDataURL(e.target.files[0])

        fileReader.onload = (e) => {
            this.image = e.target.result
            this.items.img = e.target.result
        }
        console.log(this.image);
    },

    getImage(name, type)
    { 
        var imagelogo = new Image();
        imagelogo.src = name + type;
        var vm = this;

        imagelogo.onload = function()
        {
            vm.image = name + type;
            vm.items.img = name  + type;
        }
        imagelogo.onerror = function()
        {            
            vm.image = "";
            vm.items.img = "";
        }
    }
  },

  created() {
    if(this.$route.params.id) {
       var filename = "/images/affiliations/"+ this.$route.params.id;
       this.getImage(filename, ".png");
       if(!this.image) {
          this.getImage(filename, ".jpg");
       }
       
    }

  }
 
}   
  
</script>