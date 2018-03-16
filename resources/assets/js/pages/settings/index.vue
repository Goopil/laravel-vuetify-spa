<template>
  <v-container grid-list-md text-xs-center>
    <v-layout wrap row>
      <v-flex lg3 sm4 xs12>
        <v-card>
          <v-list dense>
            <v-subheader>{{$t('common.settings')}}</v-subheader>
            <v-list-tile
              avatar v-for="component in components"
              :key="component.title"
              @click="current = component.component"
              :color="isCurrent(component.component)"
            >
              <v-list-tile-content>
                <v-list-tile-title>{{$t(component.title)}}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>
        </v-card>
      </v-flex>

      <v-flex lg9 sm8 xs12>
        <v-card>
          <component :is="current" v-on:busy="busy = $event"></component>
        </v-card>
      </v-flex>

    </v-layout>
  </v-container>
</template>

<script>
  import Profile from '~/pages/settings/profile'
  import Password from '~/pages/settings/password'

  export default {
    name: 'settings-view',
    middleware: 'auth',
    components: {
      'profile-view': Profile,
      'password-view': Password
    },
    beforeMount () {
      this.current = this.components[0].component
    },
    methods: {
      isCurrent (comp) {
        return comp === this.current ? 'primary' : ''
      }
    },
    data () {
      return {
        components: [
          {
            title: 'common.profile',
            component: 'profile-view'
          },
          {
            title: 'common.password',
            component: 'password-view'
          }
        ],
        current: null,
        busy: false
      }
    }
  }
</script>
