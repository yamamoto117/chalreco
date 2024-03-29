/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './bootstrap'
import Vue from 'vue'
import PostGood from './components/PostGood'
import FollowButton from './components/FollowButton'
import DropdownMenu from './components/DropdownMenu'
import TabsComponent from './components/TabsComponent'
import ImagePreview from './components/ImagePreview'
import HeaderImagePreview from './components/HeaderImagePreview'
import ProfileImagePreview from './components/ProfileImagePreview'
import AuthDropdownMenu from './components/AuthDropdownMenu'
import AuthResponsiveDropdownMenu from './components/AuthResponsiveDropdownMenu'

const app = new Vue({
    el: '#app',
    components: {
        PostGood,
        FollowButton,
        DropdownMenu,
        TabsComponent,
        ImagePreview,
        HeaderImagePreview,
        ProfileImagePreview,
        AuthDropdownMenu,
        AuthResponsiveDropdownMenu,
    },
    data() {
        return {
            deleteImageFlag: false,
            deleteHeaderImageFlag: false,
            deleteProfileImageFlag: false,
        };
    },
    methods: {
        handleImageRemoval() {
            this.deleteImageFlag = true;
        },
        handleHeaderImageRemoval() {
            this.deleteHeaderImageFlag = true;
        },
        handleProfileImageRemoval() {
            this.deleteProfileImageFlag = true;
        },
    },
})
