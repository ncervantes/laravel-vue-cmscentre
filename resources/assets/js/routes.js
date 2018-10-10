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
   },

   {
        path:'/festivals',

        component: require('./views/festivals/FestivalList.vue'),

        name:'listFestivals'
   },

   {
        path:'/festival-show/:id',

        component: require('./views/festivals/FestivalShow.vue'),

        name: 'showFestival'
   },

   {
        path:'/festival-add',

        component: require('./views/festivals/FestivalAdd.vue'),

        name: 'addFestival'
   },

   {
        path:'/festival-edit/:id',

        component: require('./views/festivals/FestivalEdit.vue'),

        name: 'editFestival'
   },

   {
        path:'/festival-delete/:id',

        component: require('./views/festivals/FestivalDelete.vue'),

        name: 'deleteFestival'
   },

   {
        path:'/disciplines',

        component: require('./views/disciplines/DisciplineList.vue'),

        name:'listDiscipline'
   },

   {
        path:'/discipline-add',

        component: require('./views/disciplines/DisciplineAdd.vue'),

        name: 'addDiscipline'
   },

   {
        path:'/discipline-edit/:id',

        component: require('./views/disciplines/DisciplineEdit.vue'),

        name: 'editDiscipline'
   },

   {
        path:'/discipline-show/:id',

        component: require('./views/disciplines/DisciplineShow.vue'),

        name: 'showDiscipline'
   },

   {
        path:'/discipline-delete/:id',

        component: require('./views/disciplines/DisciplineDelete.vue'),

        name: 'deleteDiscipline'
   },

   {
        path:'/venues',

        component: require('./views/venues/VenueList.vue'),

        name:'listVenue'
   },

   {
        path:'/venue-add',

        component: require('./views/venues/VenueAdd.vue'),

        name: 'addVenue'
   },

   {
        path:'/venue-edit/:id',

        component: require('./views/venues/VenueEdit.vue'),

        name: 'editVenue'
   },

   {
        path:'/venue-show/:id',

        component: require('./views/venues/VenueShow.vue'),

        name: 'showVenue'
   },

   {
        path:'/venue-delete/:id',

        component: require('./views/venues/VenueDelete.vue'),

        name: 'deleteVenue'
   },
   

   {
        path:'/camp-categories',

        component: require('./views/camps/campCategories/CampCategoryList.vue'),

        name:'listCampCategory'
   },

   {
        path:'/camp-categories-add',

        component: require('./views/camps/campCategories/CampCategoryAdd.vue'),

        name: 'addCampCategory'
   },

   
   {
        path:'/camp-categories-edit/:id',

        component: require('./views/camps/campCategories/CampCategoryEdit.vue'),

        name: 'editCampCategory'
   },

   {
        path:'/camp-categories-show/:id',

        component: require('./views/camps/campCategories/CampCategoryShow.vue'),

        name: 'showCampCategory'
   },

   {
        path:'/camp-categories-delete/:id',

        component: require('./views/camps/campCategories/CampCategoryDelete.vue'),

        name: 'deleteCampCategory'
   },

   {
        path:'/camps',

        component: require('./views/camps/CampList.vue'),

        name:'listCamp'
   },

   {
        path:'/camps-add',

        component: require('./views/camps/CampAdd.vue'),

        name: 'addCamp'
   },

   
   {
        path:'/camps-edit/:id',

        component: require('./views/camps/CampEdit.vue'),

        name: 'editCamp'
   },

   {
        path:'/camps-show/:id',

        component: require('./views/camps/CampShow.vue'),

        name: 'showCamp'
   },

   {
        path:'/camps-delete/:id',

        component: require('./views/camps/CampDelete.vue'),

        name: 'deleteCamp'
   },


]

export default new VueRouter({
  routes,
    mode: 'history',
  linkActiveClass: 'is-active'
})


