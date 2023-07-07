const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/favicon', 'public/favicon')
    .copyDirectory('node_modules/cryptocurrency-icons/svg/color', 'public/cryptocurrency-icons')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
