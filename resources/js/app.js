require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
 


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-product', require('./components/products/AddProduct.vue').default);
Vue.component('show-error', require('./components/utils/ShowError.vue').default);
Vue.component('edit-product', require('./components/products/EditProduct.vue').default);
Vue.component('product-stocks', require('./components/stocks/ProductStocks.vue').default);
Vue.component('return-product', require('./components/return_products/ReturnProduct.vue').default);



import store from './store'

const app = new Vue({
    el: '#app',
    store,
    
});
