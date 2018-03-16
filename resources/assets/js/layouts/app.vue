<template>
  <v-app toolbar>
    <v-navigation-drawer
      v-if="authenticated"
      clipped
      fixed
      v-model="drawer"
      :mini-variant.sync="mini"
      app
    >
      <nav-menu  v-on:mini="mini = !mini" :mini="mini"></nav-menu>
    </v-navigation-drawer>
    <tool-bar v-on:toggleDrawer="drawer = !drawer" :drawer="drawer"></tool-bar>
    <v-content>
      <v-container fluid>
        <transition name="page" mode="out-in">
          <router-view></router-view>
        </transition>
      </v-container>
    </v-content>
    <feedback-message></feedback-message>
    <page-footer></page-footer>
  </v-app>
</template>

<script>
import { mapGetters } from 'vuex'

import NavMenu from '~/components/NavMenu'
import ToolBar from '~/components/ToolBar'
import FeedbackMessage from '~/components/FeedbackMessage'
import PageFooter from '~/components/PageFooter'
import loading from '~/components/Loading'

export default {
  components: {
    loading,
    'nav-menu': NavMenu,
    'tool-bar': ToolBar,
    'feedback-message': FeedbackMessage,
    'page-footer': PageFooter
  },

  computed: mapGetters('auth',{
    authenticated: 'check'
  }),

  data () {
    return {
      drawer: true,
      mini: false
    }
  }
}
</script>
