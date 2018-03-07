import Vue from 'vue'
import VueI18n from 'vue-i18n'
import axios from 'axios'
import store from '../store'

Vue.use(VueI18n)

const i18n = new VueI18n({
  locale: window.config.i18n.defaultLocale,
  messages: {}
})

/**
 * @param {String} locale
 */
export async function loadMessages (locale) {
  if (Object.keys(i18n.getLocaleMessage(locale)).length === 0) {
    const { translations } = window.config.i18n
    if (locale in translations) {
      i18n.setLocaleMessage(locale, translations[locale])
    } else {
      const { data } = await axios.get(`/api/translations/locale/${locale}`)
      i18n.setLocaleMessage(locale, data)
    }
  }

  if (i18n.locale !== locale) {
    i18n.locale = locale
  }
}

(async () => {
  await loadMessages(store.getters.locale)
})()

export default i18n
