const path = require('path');

module.exports = {
    mode: 'production',
    entry: './js/script.js',
    output: {
        filename: 'frete-por-estado.min.js',
        path: path.resolve(__dirname, 'js'),
    },
    watch: true,
};
