import Vue from 'vue'
import VeeValidate from 'vee-validate'
import fr from 'vee-validate/dist/locale/fr'
import en from 'vee-validate/dist/locale/en'

// const requireContext = require.context('../../../../../node_modules/vee-validate/dist/locale', false, /.*\.js$/)
// const dictionary = requireContext.keys()
//   .map(file =>
//     [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
//   )
//   .reduce((modules, [name, module]) => {
//     modules[name] = module
//     return modules
//   }, {})

Vue.use(VeeValidate, {
  delay: 250,
  dictionary: {
    fr, en
  }
})

Vue.mixin({
  methods: {
    async formHasErrors () {
      const valid = await this.$validator.validateAll()
      if (valid) {
        this.$validator.pause()
      }
      return !valid
    }
  }
})
