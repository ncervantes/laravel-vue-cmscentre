
import Vue from 'vue';

import VueRouter from 'vue-router';

import axios from 'axios';

import BootstrapVue from 'bootstrap-vue';

import VueCkeditor from 'vue-ckeditor2';


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.use(BootstrapVue);

Vue.use(VueCkeditor);


window.Vue = Vue;

Vue.use(VueRouter);

window.axios = axios;


window.axios.defaults.headers.common = {
	'X-Requested-With': 'XMLHttpRequest'
};

