const {resolve} = require('path')

module.exports = {
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '~': resolve(__dirname, './resources/assets/js')
    }
  }
}
