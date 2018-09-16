import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';

Vue.use(VueRouter);

import App from './components/App';
import Home from './components/Home';
import GeneralComponent from './components/GeneralComponent';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '*',
            name: 'general-component',
            component: GeneralComponent
        },
    ],
});

const app = new Vue({
    el: '#app',
    store,
    components: { App },
    router,
});
