<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Page Title:"
                    label-for="pagetitleInput">
        <b-form-input id="pageTitleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Page Title">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group>

      <b-form-group id="urlInputGroup"
                    label="Url:"
                    label-for="urlInput">
        <b-form-input id="urlInput"
                      type="text"
                      v-model="items.url"                                           
                      placeholder="Enter URL">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.url)" v-text="errors.get('url')"></span>
      </b-form-group>

      <b-form-group id="pageTemplateGroup">
        <p>Page Template: </p>
        <b-form-select v-model="items.pageTemplate" :options="pageTemplateOptions.get()" class="mb-3" />
      </b-form-group>

      <h3>Page Details</h3>

      <b-form-group id="stylesheetGroup">
        <p>Stylesheet: </p>
        <b-form-select v-model="items.selected" :options="stylesheetOptions" class="mb-3" />
      </b-form-group>

      <b-form-group>
        <b-form-checkbox v-model="checked">
           Display News
         </b-form-checkbox>
      </b-form-group>

      <h3>Menu</h3>

      <b-form-group id="menuInputGroup"
                    label="Menu Text:"
                    label-for="menuInput">
        <b-form-input id="menuInput"
                      type="text"
                      v-model="items.menu_text"                                           
                      placeholder="Enter Menu Text">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.menu_text)" v-text="errors.get('menu_text')"></span>
      </b-form-group>

      <h3>Parent</h3>

      <b-form-group id="firstLevelGroup">
        <p>First Level:</p>
        <b-form-select v-model="items.index[0]" id="firstBox" :options="firstOptions.get()" class="mb-3" @change="getSelection('firstBox', 'first')" />
      </b-form-group>

      <b-form-group id="secondLevelGroup">
        <p>Second Level:</p>
        <b-form-select v-model="items.index[1]" id="secondBox" :options="secondOptions.get()" class="mb-3" @change="getSelection('secondBox', 'second')" />
      </b-form-group>

      <b-form-group id="thirdLevelGroup">
        <p>Third Level:</p>
        <b-form-select v-model="items.index[2]" id="thirdBox" :options="thirdOptions.get()" class="mb-3" @change="getSelection('thirdBox', 'third')" />
      </b-form-group>

      <b-form-group id="fourthLevelGroup">
        <p>Fourth Level:</p>
        <b-form-select v-model="items.index[3]" id="fourthBox" :options="fourOptions.get()" class="mb-3" />
      </b-form-group>

      <hr/>

      <b-form-group id="showAfterGroup">
        <p>Show After:</p>
        <b-form-select v-model="items.showAfter" :options="showAfterOptions.get()" class="mb-3" />
      </b-form-group>

      <b-form-group>
        <b-form-checkbox v-model="checkedMenu">
           Display In Menu
         </b-form-checkbox>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      
    </b-form>
  </div>
</template>


<script>
 import Options from '../../core/options'

export default {

  data() {
     return {        
        pageTemplateOptions: new Options('pageTemplate'),
        stylesheetOptions: [],        
        firstOptions: new Options('pageMenu'),
        secondOptions: new Options('pageMenu'),
        thirdOptions: new Options('pageMenu'),
        fourOptions: new Options('pageMenu'),
        showAfterOptions: new Options('pageMenuAfter'),        
        checked: false,
        checkedMenu: false, 
        url:'',
     }
  },
  
  props: ["items", "errors"],

  methods: {
     hasField(field) { 
        return (field === '');
     },

    fetchPageMenus(level, value) {
      let app = this; 
      var options; 
       
      if (level != 'NA' && value != 0) {
         this.url = '/menu/page-menus/' + value; 
      } else if (level == 'NA') {
         this.url = '/api/page-menus';
      } else {
         return;
      }

      if(level == 'NA') {
         options = app.firstOptions;
         app.showAfterOptions.clear(app.showAfterOptions);
      } else if(level == 'first') { 
         options = app.secondOptions;
         app.showAfterOptions.clear(app.showAfterOptions);
         app.showAfterOptions.setOptionValues(this.url);
      } else if(level == 'second') {
         options = app.thirdOptions;
         app.showAfterOptions.clear(app.showAfterOptions);
         app.showAfterOptions.setOptionValues(this.url);
      } else if(level == 'third') {
         options = app.fourOptions;
         app.showAfterOptions.clear(app.showAfterOptions);
         app.showAfterOptions.setOptionValues(this.url);
      } 
      
      options.setOptionValues(this.url); 
      
    },

    getSelection(listbox, level) { 
      let app = this;
      var e = document.getElementById(listbox);
      var value = e.options[e.selectedIndex].value; 

      if(level == 'first' && value == 0) {          
        app.secondOptions.clear(app.secondOptions);
        app.thirdOptions.clear(app.thirdOptions);
        app.fourOptions.clear(app.fourOptions);         
        app.clear(app.items.index, app.items.index.length, 0);
        return;
      } else if (level == 'second' && value == 0) {
        app.thirdOptions.clear(app.thirdOptions);
        app.fourOptions.clear(app.fourOptions);        
        app.clear(app.items.index, app.items.index.length - 1,1); 
      } else if (level == 'third' && value == 0) {
        app.fourOptions.clear(app.fourOptions);        
        app.clear(app.items.index, app.items.index.length - 2,2);
      }
      
      app.fetchPageMenus(level, value);
    },

    clear(index, count, idx) { 
       if(count > 0) {
          for(var i=idx; i<=count; i++) {
             index[i] = 0;
          }
       }
    }    
  },

  created() {       
    this.pageTemplateOptions.setOptionValues('api/page-templates/');    
    this.fetchPageMenus('NA', 0); 
  }  
 
}   
  
</script>