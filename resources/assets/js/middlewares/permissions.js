import { hasPermissions } from '~/plugins/rbac'
import store from '~/store'
import i18n from '~/plugins/vue-i18n'

/**
 * filter per permissions recursively on the routes tree
 * @param to
 * @param from
 * @param next
 * @returns {Promise<*>}
 */
export default async (to, from, next) => {
  if (!to.matched.some(m => m.meta.permissions)) {
    return next()
  } else {
    const permissions = to.matched
      .map(match => match.meta.permissions)
      .filter(match => match !== undefined)

    if (hasPermissions(permissions)) {
      return next()
    } else {
      store.dispatch('responseMessage', {
        type: 'error',
        text: 'you don\'t have the permission',
        title: i18n.t('common.error_alert_title'),
        modal: true
      })

      return next(from)
    }
  }
}
