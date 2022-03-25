
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import App from './App.vue'

const app = new Vue({
    el: '#App',
    render: h => h(App)
})