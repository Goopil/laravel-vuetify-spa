export default {
  path: 'admin/users',
  meta: { roles: 'admin' },
  component: () => import(/* webpackChunkName: "admin.users" */ './views/index.js'),
  children: [
    {
      path: '',
      name: 'admin.users',
      component: () => import(/* webpackChunkName: "admin.users" */ './views/list')
    },
    {
      path: ':id',
      name: 'admin.users.item',
      component: () => import(/* webpackChunkName: "admin.users" */ './views/item')
    }
  ]
}
