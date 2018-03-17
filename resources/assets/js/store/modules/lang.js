import Cookies from 'js-cookie'
import * as types from '../mutation-types'

const { defaultLocale, locales } = window.config.i18n

// state
export const state = {
  default: defaultLocale,
  locale: Cookies.get('locale') || defaultLocale,
  locales
}

// getters
export const getters = {
  locale: state => state.locale,
  locales: state => state.locales
}

// mutations
export const mutations = {
  [types.SET_LOCALE] (state, { locale }) {
    state.locale = locale
  }
}

// actions
export const actions = {
  setLocale ({ commit }, { locale }) {
    commit(types.SET_LOCALE, { locale })

    Cookies.set('locale', locale, { expires: 365 })
  }
}
