const modules = require.context('~/modules', true, /routes\.js$/)
const mapModule = requireContext => {
  return requireContext.keys()
    .reduce((routes, file) => ([
      ...routes,
      requireContext(file).default
    ]), [])
}

const routes = [
  { path: '', name: 'welcome', component: require('~/pages/welcome.vue') },

  { path: 'home', name: 'home', component: require('~/pages/home.vue') },

  {
    path: 'settings',
    component: () => import(/* webpackChunkName: "auth" */ '~/pages/settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      {
        path: 'profile',
        name: 'settings.profile',
        component: () => import(/* webpackChunkName: "auth" */ '~/pages/settings/profile.vue')
      },
      {
        path: 'password',
        name: 'settings.password',
        component: () => import(/* webpackChunkName: "auth" */ '~/pages/settings/password.vue')
      }
    ]
  },

  { path: 'login', name: 'login', component: () => import(/* webpackChunkName: "auth" */ '~/pages/auth/login.vue') },
  {
    path: 'register',
    name: 'register',
    component: () => import(/* webpackChunkName: "auth" */ '~/pages/auth/register.vue')
  },
  {
    path: 'password/reset',
    name: 'password.request',
    component: () => import(/* webpackChunkName: "auth" */ '~/pages/auth/password/email.vue')
  },
  {
    path: 'password/reset/:token',
    name: 'password.reset',
    component: () => import(/* webpackChunkName: "auth" */ '~/pages/auth/password/reset.vue')
  },
  ...mapModule(modules)
]

export default routes
