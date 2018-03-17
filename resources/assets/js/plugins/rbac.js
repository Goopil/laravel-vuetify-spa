import Vue from 'vue'
import store from '~/store'

const separator = '|'

/**
 * get payload as array
 * @param data
 * @returns {*}
 */
const hasArray = data => {
  return Array.isArray(data)
    ? data
    : (data.indexOf(separator) !== -1) ? data.split(separator) : [data]
}

/**
 * in array multiple
 *
 * @param a
 * @param b
 * @returns {boolean}
 */
const inArray = (a, b) => {
  const setA = new Set(a)
  const setB = new Set(b)
  const intersect = [...setA].filter(num => setB.has(num)) || []
  return intersect.length > 0
}

/**
 *  role check
 * @param data
 * @returns {boolean}
 */
export const hasRoles = data => {
  const roles = hasArray(data)
  return inArray(store.getters['auth/user'].roles, roles)
}

/**
 * permissions check
 * @param data
 * @returns {boolean}
 */
export const hasPermissions = data => {
  const permissions = hasArray(data)
  return inArray(store.getters['auth/user'].permissions, permissions)
}

/**
 * plugin registration
 */
Vue.use({
  install (Vue, options) {
    Vue.$hasRoles = hasRoles
    Vue.$hasPermissions = hasPermissions

    Vue.prototype.$hasRoles = hasRoles
    Vue.prototype.$hasPermissions = hasPermissions
  }
})
