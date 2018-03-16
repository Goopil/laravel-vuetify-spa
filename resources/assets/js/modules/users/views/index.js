import { mapGetters, mapActions } from 'vuex'
import * as userStore from '../store'

const name = 'users'

export default {
  name: 'users-main',
  template: `<div><router-view
    :users="users"
    :user="userByRoute"
    v-on:show-user="$router.push({ name: 'admin.users.item', params: { id: $event.id, lang: $store.getters.locale }})"
    v-on:delete-user="deleteItem"
    :loading="loading"
    ></router-view></div>`,

  computed: {
    ...mapGetters(['users', 'userByRoute'])
  },

  created () {
    if (!(this.$store.state[name])) {
      this.$store.registerModule(name, userStore)
    }
  },

  async mounted () {
    this.loading = true
    await this.fetchUsers()
    this.loading = false
  },

  methods: {
    ...mapActions(['fetchUsers', 'deleteUser']),

    async deleteItem (user) {
      this.loading = true
      await this.deleteUser(user)
      this.loading = false
    }
  },

  data: () => ({
    loading: false
  })
}
