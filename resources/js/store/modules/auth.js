// store/modules/auth.js
import axios from 'axios';

const state = {
  isAuthenticated: false,
  token: null,
  user: null,
};

const mutations = {
  SET_AUTHENTICATED(state, value) {
    state.isAuthenticated = value;
  },
  SET_TOKEN(state, token) {
    state.token = token;
  },
  SET_USER(state, user) {
    state.user = user;
  },
};

const actions = {
  login({ commit }, credentials) {
    return new Promise((resolve, reject) => {
      axios
        .post('/api/login', credentials)
        .then((response) => {
          const { token, user } = response.data;
          commit('SET_AUTHENTICATED', true);
          commit('SET_TOKEN', token);
          commit('SET_USER', user);
          resolve(response);
        })
        .catch((error) => {
          reject(error);
        });
    });
  },
  logout({ commit }) {
    return new Promise((resolve, reject) => {
      axios
        .post('/api/logout')
        .then(() => {
          commit('SET_AUTHENTICATED', false);
          commit('SET_TOKEN', null);
          commit('SET_USER', null);
          resolve();
        })
        .catch((error) => {
          reject(error);
        });
    });
  },
};

export default {
  namespaced: true,
  state,
  mutations,
  actions,
};