import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';

Vue.use(VueRouter);

import App from './components/App';
import UsersIndex from './components/UsersIndex';
import ContactsIndex from './components/ContactsIndex';
import Home from './components/Home';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/contacts',
            name: 'contacts.index',
            component: ContactsIndex,
        },
    ],
});

const app = new Vue({
    el: '#app',
    store,
    components: { App },
    router,
});
