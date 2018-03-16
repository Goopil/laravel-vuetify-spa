<template>
  <div id="app">
    <v-loading ref="loading"></v-loading>
    <transition name="page" mode="out-in">
      <component v-if="layout" :is="layout"></component>
    </transition>
  </div>
</template>

<script>
  import Loading from './Loading'
  import {mapGetters} from 'vuex'

  // Load layout components dynamically.
  const requireContext = require.context('../layouts', false, /.*\.vue$/)

  const layouts = requireContext.keys()
    .map(file =>
      [file.replace(/(^.\/)|(\.vue$)/g, ''), requireContext(file)]
    )
    .reduce((components, [name, component]) => {
      components[name] = component
      return components
    }, {})

  export default {

    components: {
      'v-loading': Loading
    },

    computed: mapGetters(['locale']),

    data: () => ({
      layout: null,
      defaultLayout: 'app'
    }),

    created () {
      this.$validator.localize(this.locale)
      this.$store.watch(state => state.lang.locale, () => {
          this.$validator.localize(this.locale)
      })
    },

    mounted () {
      this.$loading = this.$refs.loading
    },

    methods: {
      /**
       * Set the application layout.
       *
       * @param {String} layout
       */
      setLayout (layout) {
        if (!layout || !layouts[layout]) {
          layout = this.defaultLayout
        }

        this.layout = layouts[layout]
      }
    }
  }
</script>
