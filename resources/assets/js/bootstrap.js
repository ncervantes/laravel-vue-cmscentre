
import Vue from 'vue';

import VueRouter from 'vue-router';

import axios from 'axios';

import BootstrapVue from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import VueResource from 'vue-resource'


Vue.use(VueResource);

Vue.use(BootstrapVue);

window.Vue = Vue;

Vue.use(VueRouter);

window.axios = axios;


window.axios.defaults.headers.common = {
	'X-Requested-With': 'XMLHttpRequest'
};

