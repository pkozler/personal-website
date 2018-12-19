let mix = require('laravel-mix');

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

mix .js('resources/assets/js/app.js', 'public/js/')
    .sass('resources/assets/sass/app.scss', 'public/css/')
    .js('resources/assets/js/home/template.js', 'public/js/home/')
    .sass('resources/assets/sass/home/template.scss', 'public/css/home/')
    .js('resources/assets/js/home/custom.js', 'public/js/home/')
    .sass('resources/assets/sass/home/custom.scss', 'public/css/home/')
    .js('resources/assets/js/admin/template.js', 'public/js/admin/')
    .sass('resources/assets/sass/admin/template.scss', 'public/css/admin/')
    .options({
        processCssUrls: false
    })
    .minify(['public/css/app.css', 'public/css/home/template.css', 'public/css/admin/template.css'])
    .minify(['public/js/app.js', 'public/js/home/template.js', 'public/js/admin/template.js'])
;
