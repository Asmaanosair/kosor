import {validate} from "vee-validate";


require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Routes from './routes';
import VueSweetAlert2 from 'vue-sweetalert2';

Vue.config.productionTip = false

Vue.use(VueSweetAlert2);



Vue.use(VueRouter);
Vue.use(VueAxios, axios);
// Vue.use(VeeValidate);

axios.defaults.baseURL='/Admin_CP'
Vue.component('region-component', require('./components/admin/region/ShowAll').default);
Vue.component('city-component', require('./components/admin/city/ShowAll').default);
Vue.component('district-component', require('./components/admin/district/ShowAll').default);
Vue.component('order-component', require('./components/admin/order/ShowAll').default);
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');



const app = new Vue({
    el: '#main-wrapper',

    router: new VueRouter(Routes),
 mounted(){
     window.Echo.channel('load-order')
         .listen('OrderEvent', (e) => {
             this.allOrders.push(e.orders);
             console.log("pusher");
             console.log('test pusher')
         });
 }
});
