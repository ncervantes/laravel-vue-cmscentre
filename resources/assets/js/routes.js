import VueRouter from 'vue-router';

let routes = [
   {
   	  path:'/affiliations',

   	  component: require('./views/affiliations/AffiliationList.vue'),

   	  name:'listAffiliation'
   },

   {
   	  path:'/affiliation-show/:id',

   	  component: require('./views/affiliations/AffiliationShow.vue'),

   	  name: 'showAffiliation'
   },

   {
   	  path:'/affiliation-add',

   	  component: require('./views/affiliations/AffiliationAdd.vue'),

   	  name: 'addAffiliation'
   },

   {
   	  path:'/affiliation-edit/:id',

   	  component: require('./views/affiliations/AffiliationEdit.vue'),

   	  name: 'editAffiliation'
   },

   {
   	  path:'/affiliation-delete/:id',

   	  component: require('./views/affiliations/AffiliationDelete.vue'),

   	  name: 'deleteAffiliation'
   }


]

export default new VueRouter({
	routes,
    mode: 'history',
	linkActiveClass: 'is-active'
})


