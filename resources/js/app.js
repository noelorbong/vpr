/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import Loading from "vue-loading-overlay";
import Vue from 'vue';
import VModal from 'vue-js-modal'
 

import Dashboard from './components/Dashboard.vue';
import Camera from './components/Camera.vue';

import VehicleAdd from './components/vehicle/Add.vue';
import VehicleList from './components/vehicle/List.vue';
import VehicleEdit from './components/vehicle/Edit.vue';
import VehicleProfile from './components/vehicle/Profile.vue';

import LicenseAdd from './components/license/Add.vue';
import LicenseList from './components/license/List.vue';
import LicenseEdit from './components/license/Edit.vue';
import LicenseProfile from './components/license/Profile.vue';

import ViolationAdd from './components/violation/Add.vue';
import ViolationList from './components/violation/List.vue';
import ViolationEdit from './components/violation/Edit.vue';

import ViolatorAdd from './components/violator/Add.vue';
import ViolatorList from './components/violator/List.vue';
import ViolatorEdit from './components/violator/Edit.vue';
import ViolatorScannedList from './components/violator/ScannedList.vue'
import ViolatorScannedEdit from './components/violator/ScannedEdit.vue'


import MissingAdd from './components/missing/Add.vue';
import MissingList from './components/missing/List.vue';
import MissingFoundList from './components/missing/ListFound.vue';
import MissingEdit from './components/missing/Edit.vue';

Vue.component('loading', Loading);
Vue.directive('focus', {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
        // Focus the element
        el.focus()
    }
})

window.Vue.use(VueRouter);
Vue.use(VModal);

const routes = [{
    path: '/',
    components: {
        dashboard: Dashboard
    },
    
    }
    ,{ path: '/camera', component: Camera, name: 'Camera' }
    ,{ path: '/vehicle/register', component: VehicleAdd, name: 'VehicleAdd' }
    ,{ path: '/vehicle/list', component: VehicleList, name: 'VehicleList' }
    ,{ path: '/vehicle/edit/:id', component: VehicleEdit, name: 'VehicleEdit' }
    ,{ path: '/vehicle/profile/:id', component: VehicleProfile, name: 'VehicleProfile' }
    ,{ path: '/license/register', component: LicenseAdd, name: 'LicenseAdd' }
    ,{ path: '/license/list', component: LicenseList, name: 'LicenseList' }
    ,{ path: '/license/edit/:id', component: LicenseEdit, name: 'LicenseEdit' }
    ,{ path: '/license/profile/:id', component: LicenseProfile, name: 'LicenseProfile' }
    ,{ path: '/violation/register', component: ViolationAdd, name: 'ViolationAdd' }
    ,{ path: '/violation/list', component: ViolationList, name: 'ViolationList' }
    ,{ path: '/violation/edit/:id', component: ViolationEdit, name: 'ViolationEdit' }
    ,{ path: '/violator/register', component: ViolatorAdd, name: 'ViolatornAdd' }
    ,{ path: '/violator/list', component: ViolatorList, name: 'ViolatorList' }
    ,{ path: '/violator/scanned/list', component: ViolatorScannedList, name: 'ViolatorScannedList' }
    ,{ path: '/violator/scanned/edit/:id', component: ViolatorScannedEdit, name: 'ViolatorScannedEdit' }
    ,{ path: '/violator/edit/:id', component: ViolatorEdit, name: 'ViolatorEdit' }
    ,{ path: '/missing/register', component: MissingAdd, name: 'MissingAdd' }
    ,{ path: '/missing/list', component: MissingList, name: 'MissingList' }
    ,{ path: '/missing/found/list', component: MissingFoundList, name: 'MissingFoundList' }
    ,{ path: '/missing/edit/:id', component: MissingEdit, name: 'MissingEdit' }
]

const router = new VueRouter({
    routes
})


const app = new Vue({
    router
}).$mount('#app')