import { hasRoles } from '~/plugins/rbac'
import store from '~/store'
import i18n from '~/plugins/vue-i18n'

/**
 * filter per roles recursively on the routes tree
 * @param to
 * @param from
 * @param next
 * @returns {Promise<*>}
 */
export default async (to, from, next) => {
  if (!to.matched.some(m => m.meta.roles)) {
    return next()
  } else {
    const roles = to.matched
      .map(match => match.meta.roles)
      .filter(match => match !== undefined)

    if (hasRoles(roles)) {
      return next()
    } else {
      store.dispatch('responseMessage', {
        type: 'error',
        text: 'you don\'t have the role to see this page',
        title: i18n.t('common.error_alert_title'),
        modal: true
      })

      return next(from)
    }
  }
}
