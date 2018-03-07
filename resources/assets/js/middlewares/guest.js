import store from '~/store'

export default (to, from, next) => {
  if (store.getters['auth/check']) {
    next({ name: 'root', params: { lang: store.getters.locale } })
  } else {
    next()
  }
}
