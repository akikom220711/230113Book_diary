/*require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();*/

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import axios from 'axios';

const app = new Vue({
    el: '#app',
    data: {
        isShow: false,
        date: '',
        title: '',
        author: '',
        publisher: '',
        year: '',
        comment: '',
        category: 1,
        mystery_color: {backgroundColor: ''},
        fantasy_color: {backgroundColor: ''},
        SF_color: {backgroundColor: ''},
        nonfiction_color: {backgroundColor: ''},
        others_color: {backgroundColor: ''}
    },
    methods:{
        openModal(){
            this.isShow = true;
        },
        closeModal(){
            this.isShow = false;

            this.title = '';
            this.author = '';
            this.publisher = '';
            this.year = '';
            this.comment = '';
            this.category = 1;
        },
        stopEvent(){
            event.stopPropagation();
        },
        sendDate(noTimeDate) { 
            this.date = noTimeDate;
        },
        sendColor(setting) { 
            this.mystery_color.backgroundColor = setting.mystery_color;
            this.fantasy_color.backgroundColor = setting.fantasy_color;
            this.SF_color.backgroundColor = setting.SF_color;
            this.nonfiction_color.backgroundColor = setting.nonfiction_color;
            this.others_color.backgroundColor = setting.others_color;
        }
    }
})
