const mix = require('laravel-mix')
const webpackAlias = require('./webpack.config')
const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix
  .js('resources/assets/js/app.js', 'public/js')
  .stylus('resources/assets/stylus/app.styl', 'public/css')
  .sourceMaps()
  .disableNotifications()
  .copyDirectory('resources/assets/img', 'public/img')
  .version()
  .extract([
    'vue',
    'axios',
    'vuex',
    'vue-i18n',
    'vue-router',
    'vuex-router-sync',
    'vuetify',
    'vform',
    'js-cookie',
    'vee-validate',
    'vee-validate/dist/locale/fr.js',
    'vee-validate/dist/locale/en.js'
  ])

mix.webpackConfig({
  ...webpackAlias,
  plugins: [
    new BundleAnalyzerPlugin()
  ],
  output: {
    chunkFilename: 'js/[name].js',
    publicPath: mix.config.hmr ? '//localhost:8080' : '/'
  }
})
