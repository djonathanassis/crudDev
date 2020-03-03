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
    mix
        .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/bootstrap.css')
        .react('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
        .react('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js');
// mix.react('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
