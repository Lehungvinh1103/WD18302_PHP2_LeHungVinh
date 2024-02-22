const path = require('path');

module.exports = {

    entry: {
        main: './public/assets/src/main.js'
    },

    output: {
        filename: '[name].bundle.js',
        path: path.join(__dirname, '/public/assets/dist')
    },

    watch: true,

    mode: 'development'

}