import axios from 'axios'
import store from '~/store'
import router from '~/router'
import i18n from './vue-i18n'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

axios.interceptors.request.use(request => {
  if (store.getters['auth/token']) {
    request.headers.common['Authorization'] = `Bearer ${store.getters['auth/token']}`
  }
  return request
})

axios.interceptors.response.use(response => response, error => {
  const { status } = error.response

  if (status >= 500) {
    store.dispatch('responseMessage', {
      type: 'error',
      text: i18n.t('error_alert_text'),
      title: i18n.t('error_alert_title'),
      modal: true
    })
  }

  if (status === 401 && store.getters['auth/check']) {
    store.dispatch('responseMessage', {
      type: 'warning',
      text: i18n.t('token_expired_alert_text'),
      title: i18n.t('token_expired_alert_title'),
      modal: true
    })
      .then(async () => {
        await store.dispatch('auth/logout')

        router.push({ name: 'login' })
      })
  }

  return Promise.reject(error)
})
