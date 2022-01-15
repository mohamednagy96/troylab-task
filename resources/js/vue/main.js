import Vue from 'vue';
import './plugins';

Vue.component('video-component', require('./components/video.vue').default);

const app = new Vue({
    el: '#app',
});
