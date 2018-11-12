<template>
 
  <div>
    <slot></slot>
    <b-form @submit.prevent="$emit('saveData', 'listBox2')" @keydown = "errors.clear($event.target.name)">
      <b-form-group id="usernameInputGroup"
                    label="User Name:"
                    label-for="usernameInput">
        <b-form-input id="usernameInput"
                      type="text"
                      v-model="items.username"                                           
                      placeholder="Enter User Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.username)" v-text="errors.get('username')"></span>
      </b-form-group> 

      <b-form-group id="passwordInputGroup"
                    label="Password:"
                    label-for="passwordInput">
        <b-form-input id="passwordInput"
                      type="password"
                      v-model="items.password"                                           
                      placeholder="Enter Password">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.password)" v-text="errors.get('password')"></span>
      </b-form-group> 

      <b-form-group id="nameInputGroup"
                    label="User Full Name:"
                    label-for="groupfullnameInput">
        <b-form-input id="fullnameInput"
                    type="text"
                    v-model="items.name"                                           
                    placeholder="Enter User Full Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.name)" v-text="errors.get('name')"></span>
      </b-form-group> 

      <b-form-group id="companyInputGroup"
                    label="User Company Name:"
                    label-for="groupcompanyInput">
        <b-form-input id="companyInput"
                    type="text"
                    v-model="items.company"                                           
                    placeholder="Enter Company Name">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.company)" v-text="errors.get('company')"></span>
      </b-form-group> 

      <b-form-group id="phoneInputGroup"
                    label="User Phone Number:"
                    label-for="groupphoneInput">
        <b-form-input id="phoneInput"
                    type="tel"
                    v-model="items.phone"                                           
                    placeholder="Enter Phone Number">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.phone)" v-text="errors.get('phone')"></span>
      </b-form-group> 

      <b-form-group id="phoneInputGroup"
                    label="User Email:"
                    label-for="groupemailInput">
        <b-form-input id="emailInput"
                    type="email"
                    v-model="items.email"                                           
                    placeholder="Enter Email">
        </b-form-input>
        <span class="help is-danger" v-if="hasField(items.email)" v-text="errors.get('email')"></span>
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

import Info from '../../core/info'

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

  },  
 
}   
  
</script>