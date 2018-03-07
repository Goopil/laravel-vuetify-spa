<template>
  <v-layout row>
    <v-flex xs10 offset-xs1>
      <v-card>
        <progress-bar :show="busy"></progress-bar>
        <v-card-title primary-title>
          <h3 class="headline mb-0">{{ $t('settings') }}</h3>
        </v-card-title>
        <v-tabs icons centered fixed>
          <v-tabs-bar class="grey lighten-4">
            <v-tabs-slider color="primary"></v-tabs-slider>
            <v-tabs-item href="#tab-person">
              <v-icon>person</v-icon>
              {{ $t('profile') }}
            </v-tabs-item>
            <v-tabs-item href="#tab-password">
              <v-icon>lock</v-icon>
              {{ $t('password') }}
            </v-tabs-item>
          </v-tabs-bar>
          <v-divider></v-divider>

          <v-tabs-items>
            <v-tabs-content id="tab-person">
              <profile-view v-on:busy="busy = $event"></profile-view>
            </v-tabs-content>
            <v-tabs-content id="tab-password">
              <password-view v-on:busy="busy = $event"></password-view>
            </v-tabs-content>
          </v-tabs-items>
        </v-tabs>
      </v-card>
    </v-flex>
  </v-layout>
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
  data () {
    return {
      busy: false
    }
  }
}
</script>
