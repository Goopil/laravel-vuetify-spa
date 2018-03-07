export default [
  { path: '', name: 'welcome', component: require('~/pages/welcome.vue') },

  { path: 'home', name: 'home', component: require('~/pages/home.vue') },

  {
    path: 'settings',
    component: require('~/pages/settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: require('~/pages/settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: require('~/pages/settings/password.vue') }
    ]
  },

  { path: 'login', name: 'login', component: require('~/pages/auth/login.vue') },
  { path: 'register', name: 'register', component: require('~/pages/auth/register.vue') },
  { path: 'password/reset', name: 'password.request', component: require('~/pages/auth/password/email.vue') },
  { path: 'password/reset/:token', name: 'password.reset', component: require('~/pages/auth/password/reset.vue') },
]
