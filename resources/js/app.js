/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'
import BootstrapVue from 'bootstrap-vue'
import vuescrollto from 'vue-scrollto'

import 'vuetify/dist/vuetify.min.css'

// app.js
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify) //vuetify for pages traversal
Vue.use(BootstrapVue) //bootstrap for navbar
Vue.use(vuescrollto) //for easy scrolling

// Vue.use(Vuetify, {
//     theme: {
//         primary: "#D5D8DC",
//         secondary: "#D5D8DC",
//         accent: "#9c27b0",
//         error: "#f44336",
//         warning: "#ffeb3b",
//         info: "#2196f3",
//         success: "#4caf50"
//     }
// })

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('survey-component', require('./components/SurveyComponent.vue').default);
Vue.component('introduction-component', require('./components/IntroductionComponent.vue').default);
Vue.component('plan-component', require('./components/PlanComponent.vue').default);
Vue.component('lastDay-component', require('./components/LastDayComponent.vue').default);
Vue.component('myBody-component', require('./components/MyBodyComponent.vue').default);
Vue.component('myMindset-component', require('./components/MyMindsetComponent.vue').default);
Vue.component('mySkiing-component', require('./components/MySkiingComponent.vue').default);
Vue.component('goals-component', require('./components/GoalsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
