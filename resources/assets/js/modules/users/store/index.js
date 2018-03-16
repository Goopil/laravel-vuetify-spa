import axios from 'axios'

export const state = {
  all: []
}

export const mutations = {
  SET_USERS (state, data) {
    state.all = data
  },

  CONCAT_USERS (state, data) {
    state.all = [...new Set([...state.all, ...data])]
  },

  DELETE_USER (state, user) {
    const index = state.all.findIndex(u => u.id === user.id)
    state.all.splice(index, 1)
  }
}

export const actions = {
  async fetchUsers ({ dispatch }, force = false) {
    let { users } = window.__state__
    if (users === undefined || users.length < 1 || force === true) {
      const { data } = await axios.get('/api/users')
      users = data
    }

    await dispatch('setUsers', users)
  },

  setUsers ({ commit }, data) {
    return new Promise(resolve => {
      commit('SET_USERS', data)
      resolve()
    })
  },

  async deleteUser ({ commit, dispatch }, user) {
    await axios.delete('/api/users/' + user.id)
    commit('DELETE_USER', user)
    await dispatch('responseMessage', {
      type: 'success',
      text: `User ${user.name} deleted`
    })
  }
}

export const getters = {
  users: state => state.all,
  userByRoute: (state, getters, rootState) => state.all.find(u => u.id === parseInt(rootState.route.params.id))
}
