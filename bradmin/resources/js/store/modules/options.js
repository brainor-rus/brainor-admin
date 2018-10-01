// initial state
const state = {
    adminUrl: window.adminUrl
};

// mutations
const mutations = {
    adminUrlUpdate (state, newUrl) {
        state.adminUrl = newUrl;
    },
};

export default {
    state,
    mutations
}