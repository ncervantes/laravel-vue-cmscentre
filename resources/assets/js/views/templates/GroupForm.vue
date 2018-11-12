<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData', 'listBox2')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="titleInputGroup"
                    label="Group Name:"
                    label-for="grouptitleInput">
        <b-form-input id="titleInput"
                      type="text"
                      v-model="items.title"                                           
                      placeholder="Enter Group Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.title)" v-text="errors.get('title')"></span>
      </b-form-group> 

      <div>
        <select multiple name="listBox1" id="listBox1" size="9" style="min-width: 200px;">
            <option v-for="option in options" :value = "option.value">{{option.text}}</option>
        </select>

        <button id = "btnMoveRight"  @click.prevent = "fnMoveItems('listBox1','listBox2')">>></button>
        <button id = "btnMoveLeft"  @click.prevent = "fnMoveItems('listBox2','listBox1')"><<</button>

        <select multiple name="listBox2" id="listBox2" size="9" style="min-width: 200px;">
           <option v-for="listoption in listoptions" :value = "listoption.value">{{listoption.text}}</option>   
        </select>
      </div>      

      <b-button type="submit" variant="primary">Submit</b-button>
      
    </b-form>
  </div>
</template>

<script>

import Info from '../../core/info';
   
export default {
  
  props: ["items", "errors", "options", "listoptions"],

  data() {
     return {
        info: new Info(),
     }
  },

  methods: {
    hasField(field) { 
       return (field === '');
    },

    fnMoveItems(lstbxFrom, lstbxTo)
    {
      var app = this;
      app.info.moveItems(app.options, app.listoptions, lstbxFrom, lstbxTo);
    }
    
  }
}   
  
</script>