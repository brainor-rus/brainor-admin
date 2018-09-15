import Vue from 'vue';
import Vuex from 'vuex'
import sidebar from './modules/sidebar';
import title from './modules/title';

Vue.use(Vuex);


export default new Vuex.Store({
    modules: {
        sidebar,
        title
}
});