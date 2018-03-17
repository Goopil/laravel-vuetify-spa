import axios from 'axios'
import * as types from './types'

export const state = {
  all: []
}

export const mutations = {
  [types.SET_USERS] (state, data) {
    state.all = data
  },

  [types.CONCAT_USERS] (state, data) {
    state.all = [...new Set([...state.all, ...data])]
  },

  [types.DELETE_USER] (state, user) {
    const index = state.all.findIndex(u => u.id === user.id)
    state.all.splice(index, 1)
  },

  [types.REPLACE_USER] (state, user) {
    const index = state.all.findIndex(u => u.id === user.id)
    state.all.splice(index, 1, user)
  }
}

export const actions = {
  async fetchUsers ({ dispatch }, force = false) {
    let { users } = window.__state__
    if (users === undefined || users.length < 1 || force === true) {
      const { data } = await axios.get('/api/users')
      users = data.users
    }

    await dispatch('setUsers', users)
  },

  setUsers ({ commit }, data) {
    return new Promise(resolve => {
      commit(types.SET_USERS, data)
      resolve()
    })
  },

  async fetchUserDetail ({commit, getters, rootState}, force = false) {
    let { user } = window.__state__
    if (user === undefined || user.length < 1 || force === true) {
      const { data } = await axios.get('/api/users/' + getters.userByRoute)
      user = data
    }

    commit(types.REPLACE_USER, user)
  },

  async deleteUser ({ commit, dispatch }, user) {
    await axios.delete('/api/users/' + user.id)
    commit(types.DELETE_USER, user)
    await dispatch('responseMessage', {
      type: 'success',
      text: `User ${user.name} deleted`
    })
  }
}

export const getters = {
  users: state => state.all || [],
  userByRoute: (state, getters, rootState) => state.all.find(u => u.id === parseInt(rootState.route.params.id))
}
