export default {
  path: 'admin/users',
  component: () => import(/* webpackChunkName: "admin.users" */ './views/index.js'),
  children: [
    {
      path: '',
      name: 'admin.users',
      // meta: { keepAlive: true },
      component: () => import(/* webpackChunkName: "admin.users" */ './views/list')
    },
    {
      path: ':id',
      name: 'admin.users.item',
      component: () => import(/* webpackChunkName: "admin.users" */ './views/item')
    }
  ]
}
