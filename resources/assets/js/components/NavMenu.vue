<template>
  <div>
    <v-list dense>
      <v-list-tile>
        <v-list-tile-content v-if="!mini"></v-list-tile-content>
        <v-list-tile-action>
          <v-btn icon @click.native.stop="$emit('mini')">
            <v-icon>{{chevron}}</v-icon>
          </v-btn>
        </v-list-tile-action>
      </v-list-tile>


    </v-list>
    <v-divider></v-divider>
    <v-list>
      <v-list-tile
        value="true"
        v-for="(item, i) in items"
        :key="i"
        :to="{name: item.name, params: {lang: $store.getters.locale}}"
      >
        <v-list-tile-action>
          <v-icon light v-html="item.icon"></v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title v-text="item.title"></v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list>
  </div>
</template>

<script>
  export default {
    props: ['mini'],
    computed: {
      chevron () {
        return this.mini ? 'chevron_right': 'chevron_left'
      }
    },
    data () {
      return {
        name: this.$t('nav_menu_title'),
        items: [
          { title: 'Dashboard', icon: 'dashboard', name: 'home' },
          { title: 'Account', icon: 'account_box', name: 'settings.profile' }
        ]
      }
    }
  }
</script>
