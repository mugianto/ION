const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.json'],
        modules: [
            'node_modules',
        ],
    },
});

mix.js('resources/js/all.js', 'public/mixUghi.min.js')
    .postCss('resources/css/all.css', 'public/mixUghi.min.css', [
        // daftar plugin PostCSS jika diperlukan
    ]);