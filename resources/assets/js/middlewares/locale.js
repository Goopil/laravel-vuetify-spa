import store from '~/store'
import { loadMessages } from '~/plugins/vue-i18n'

export default async (to, from, next) => {
  if (to.params.lang === undefined) {
    to.params.lang = store.getters['locale']
  }

  if (store.getters['locale'] !== to.params.lang) {
    await store.dispatch('setLocale', { locale: to.params.lang })
    await loadMessages(store.getters['locale'])
  }

  next()
}
