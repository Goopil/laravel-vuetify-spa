import axios from 'axios'
import * as types from './types'

export const state = {
  all: []
}

export const mutations = {
  [types.SET_ROLES] (state, data) {
    state.all = data
  },

  [types.CONCAT_ROLES] (state, data) {
    state.all = [...new Set([...state.all, ...data])]
  }
}

export const actions = {
  async fetchRoles ({ dispatch }, force = false) {
    let { roles } = window.__state__
    if (roles === undefined || roles.length < 1 || force === true) {
      const { data } = await axios.get('/api/roles')
      roles = data
    }

    await dispatch('setRoles', roles)
  },

  setRoles ({ commit }, data) {
    return new Promise(resolve => {
      commit(types.SET_ROLES, data)
      resolve()
    })
  }

}

export const getters = {
  roles: state => state.all
}
