<template>
  <div>
    <v-list dense>
      <v-list-tile>
        <v-list-tile-content v-if="!mini"></v-list-tile-content>
        <v-list-tile-action>
          <v-btn icon @click.prevent.stop="$emit('mini')">
            <v-icon>{{chevron}}</v-icon>
          </v-btn>
        </v-list-tile-action>
      </v-list-tile>
    </v-list>

    <v-divider></v-divider>

    <v-list>
      <v-list-tile
        value="true"
        v-for="(item, i) in userItems"
        :key="i"
        :to="{name: item.name, params: {lang: $store.getters.locale}}"
        @click.prevent.stop
      >
        <v-list-tile-action>
          <v-icon light v-html="item.icon"></v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title v-text="item.title"></v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>

    <span v-if="$hasRoles('admin') || true">
    <v-divider></v-divider>
    <v-list>
      <v-list-tile
        value="true"
        v-for="(item, i) in adminItems"
        :key="i"
        :to="{name: item.name, params: {lang: $store.getters.locale}}"
        @click.prevent.stop
      >
        <v-list-tile-action>
          <v-icon light v-html="item.icon"></v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title v-text="item.title"></v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>
      </span>
  </div>
</template>

<script>
  export default {
    props: ['mini'],
    computed: {
      chevron () {
        return this.mini ? 'chevron_right' : 'chevron_left'
      }
    },
    data () {
      return {
        name: this.$t('common.nav_menu_title'),
        userItems: [
          { title: 'Dashboard', icon: 'dashboard', name: 'home' }
        ],
        adminItems: [
          { title: 'Users', icon: 'account_box', name: 'admin.users' }
        ]
      }
    }
  }
</script>
