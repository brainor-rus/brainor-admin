// initial state
const state = {
    sidebarOpen: false
};

// mutations
const mutations = {
    sidebarOpenState (state, newState) {
        state.sidebarOpen = newState;
    },
};

export default {
    state,
    mutations
}