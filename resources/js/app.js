
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('feedback-add-component', require('./components/Feedback/FeedbackAddComponent.vue').default);


const app = new Vue({
    el: '#app',
});
