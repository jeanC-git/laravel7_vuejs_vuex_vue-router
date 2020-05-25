import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        counter: 1000,
        usuario: false,
    },
    getters: {
        getCounter(state) {
            return state.counter
        },
        obtenerUsuarioAuth(state) {
            return state.usuario
        }
    },
    mutations: {
        aumentar(state, data) {
            state.counter += data
        },
        imprimir() {
            console.log('imprimir');
        },
        guardarUsuario(state, data) {
            state.usuario = data
        }

    },
    actions: {
        changeCounterAction({ commit }, data) {
            commit('aumentar', data)
            commit('imprimir')

        }
    },
    modules: {
    }
})
