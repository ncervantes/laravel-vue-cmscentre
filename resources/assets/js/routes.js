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

   {
        path:'/eventcategories',

        component: require('./views/eventCategories/EventCategoryList.vue'),

        name:'listEventCategory'
   },

   {
        path:'/eventcategories-add',

        component: require('./views/eventCategories/EventCategoryAdd.vue'),

        name: 'addEventCategory'
   },

   {
        path:'/eventcategories-edit/:id',

        component: require('./views/eventCategories/EventCategoryEdit.vue'),

        name: 'editEventCategory'
   },

   {
        path:'/eventcategories-show/:id',

        component: require('./views/eventCategories/EventCategoryShow.vue'),

        name: 'showEventCategory'
   },

   {
        path:'/eventcategories-delete/:id',

        component: require('./views/eventCategories/EventCategoryDelete.vue'),

        name: 'deleteEventCategory'
   },

   {
        path:'/events',

        component: require('./views/events/EventList.vue'),

        name:'listEvent'
   },

   {
        path:'/event-show/:id',

        component: require('./views/events/EventShow.vue'),

        name: 'showEvent'
   },

   {
        path:'/event-add',

        component: require('./views/events/EventAdd.vue'),

        name: 'addEvent'
   },

   {
        path:'/event-edit/:id',

        component: require('./views/events/EventEdit.vue'),

        name: 'editEvent'
   },

   {
        path:'/event-delete/:id',

        component: require('./views/events/EventDelete.vue'),

        name: 'deleteEvent'
   },

   {
        path:'/groups',

        component: require('./views/groups/GroupList.vue'),

        name:'listGroup'
   },

   {
        path:'/group-show/:id',

        component: require('./views/groups/GroupShow.vue'),

        name: 'showGroup'
   },

   {
        path:'/group-add',

        component: require('./views/groups/GroupAdd.vue'),

        name: 'addGroup'
   },

   {
        path:'/group-edit/:id',

        component: require('./views/groups/GroupEdit.vue'),

        name: 'editGroup'
   },

   {
        path:'/group-delete/:id',

        component: require('./views/groups/GroupDelete.vue'),

        name: 'deleteGroup'
   },

   {
        path:'/users',

        component: require('./views/users/UserList.vue'),

        name:'listUser'
   },

   {
        path:'/user-show/:id',

        component: require('./views/users/UserShow.vue'),

        name: 'showUser'
   },

   {
        path:'/user-add',

        component: require('./views/users/UserAdd.vue'),

        name: 'addUser'
   },

   {
        path:'/user-edit/:id',

        component: require('./views/users/UserEdit.vue'),

        name: 'editUser'
   },

   {
        path:'/user-delete/:id',

        component: require('./views/users/UserDelete.vue'),

        name: 'deleteUser'
   },

   {
        path:'/page-templates',

        component: require('./views/pageTemplates/PageTemplateList.vue'),

        name:'listPageTemplate'
   },

   {
        path:'/page-templates-show/:id',

        component: require('./views/pageTemplates/PageTemplateShow.vue'),

        name: 'showPageTemplate'
   },

   {
        path:'/page-templates-add',

        component: require('./views/pageTemplates/PageTemplateAdd.vue'),

        name: 'addPageTemplate'
   },

   {
        path:'/page-templates-edit/:id',

        component: require('./views/pageTemplates/PageTemplateEdit.vue'),

        name: 'editPageTemplate'
   },

   {
        path:'/page-template-delete/:id',

        component: require('./views/pageTemplates/PageTemplateDelete.vue'),

        name: 'deletePageTemplate'
   },

   {
        path:'/style-sheets',

        component: require('./views/styleSheets/StyleSheetList.vue'),

        name:'listStyleSheet'
   },

   {
        path:'/style-sheets-show/:id',

        component: require('./views/styleSheets/StyleSheetShow.vue'),

        name: 'showStyleSheet'
   },

   {
        path:'/style-sheets-add',

        component: require('./views/styleSheets/StyleSheetAdd.vue'),

        name: 'addStyleSheet'
   },

   {
        path:'/style-sheets-edit/:id',

        component: require('./views/styleSheets/StyleSheetEdit.vue'),

        name: 'editStyleSheet'
   },

   {
        path:'/style-sheets-delete/:id',

        component: require('./views/styleSheets/StyleSheetDelete.vue'),

        name: 'deleteStyleSheet'
   },

   {
        path:'/page-menus',

        component: require('./views/page&menus/PageMenuTree.vue'),

        name:'listPageMenu'
   },

   {
        path:'/page-menus-add',

        component: require('./views/page&menus/PageMenuAdd.vue'),

        name:'addPageMenu'
   },
   
]

export default new VueRouter({
  routes,
    mode: 'history',
  linkActiveClass: 'is-active'
})


