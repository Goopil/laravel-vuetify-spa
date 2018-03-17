import * as userStore from '../store/user'

const name = 'users'

export default {
  middleware: 'auth',
  name: 'users-wrapper',
  template: `<div><router-view></router-view></div>`,

  created () {
    if (!(this.$store.state[name])) {
      this.$store.registerModule(name, userStore)
    }
  }
}
