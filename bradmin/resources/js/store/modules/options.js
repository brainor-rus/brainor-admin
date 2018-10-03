// initial state
const state = {
    adminUrl: window.adminUrl,
    activeUrlParams: location.pathname
};

// mutations
const mutations = {
    adminUrlUpdate (state, newUrl) {
        state.adminUrl = newUrl;
    },
    activeUrlParams (state, newUrl) {
        state.activeUrlParams = newUrl;
    },
};

export default {
    state,
    mutations
}