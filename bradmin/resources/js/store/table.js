import Vue from 'vue';

// register modal component
Vue.component('modal', {
    template: '#modal-template'
});

// start app
new Vue({
    el: '#app1',
    data: {
        showModal: false
    }
});