<template>

  <v-toolbar fixed app clipped-left>
    <v-toolbar-side-icon @click.stop="toggleDrawer" v-if="authenticated"></v-toolbar-side-icon>
    <v-toolbar-title>
      <router-link :to="{ name: 'welcome', params: {lang: $store.getters.locale} }">
        {{ appName }}
      </router-link>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-menu :nudge-width="100">
      <v-toolbar-title slot="activator">
        <v-icon>language</v-icon>
      </v-toolbar-title>
      <v-list>
        <v-list-tile v-for="locale in locales" :key="locale" :to="{name: $route.name, params: { lang: locale }}">
          <v-list-tile-title v-text="locale"></v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>

    <!-- Authenticated -->
    <template v-if="authenticated">
      <progress-bar :show="busy"></progress-bar>
      <v-menu :nudge-width="150" class="mr-3 ml-1">
        <v-toolbar-title slot="activator">
          <v-icon>more_vert</v-icon>
        </v-toolbar-title>
        <v-list>

          <v-list-tile :to="{ name: 'settings.profile', params: {lang: $store.getters.locale} }">
            <v-list-tile-title>{{$t('common.settings')}}</v-list-tile-title>
          </v-list-tile>
          <v-list-tile @click.prevent="logout"id="logout">
            <v-list-tile-title>{{ $t('common.logout') }}</v-list-tile-title>
          </v-list-tile>

        </v-list>
      </v-menu>
    </template>

    <!-- Guest -->
    <template v-else>
      <v-btn flat :to="{ name: 'login', params: {lang: $store.getters.locale}  }">{{ $t('common.login') }}</v-btn>
      <v-btn flat :to="{ name: 'register', params: {lang: $store.getters.locale}  }">{{ $t('common.register') }}</v-btn>
    </template>
  </v-toolbar>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    props: {
      drawer: {
        type: Boolean,
        required: true
      }
    },

    data: () => ({
      appName: window.config.appName,
      busy: false
    }),

    computed: {
      ...mapGetters('auth', {
        authenticated: 'check'
      }),
      ...mapGetters(['locales'])
    },

    methods: {
      toggleDrawer () {
        this.$emit('toggleDrawer')
      },
      async logout () {
        this.busy = true

        if (this.drawer) {
          this.toggleDrawer()
        }

        // Log out the user.
        await this.$store.dispatch('auth/logout')
        this.busy = false

        // Redirect to login.
        this.$router.push({ name: 'login', params: { lang: this.$store.getters.locale } })
      }
    }
  }
</script>
