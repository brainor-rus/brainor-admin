// initial state
const state = {
    title: 'Главная'
};

// mutations
const mutations = {
    titleUpdate (state, newTitle) {
        state.title = newTitle;
    },
};

export default {
    state,
    mutations
}