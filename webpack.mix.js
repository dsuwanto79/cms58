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

mix.styles(['resources/css_udemy/libs/blog-post.css',
    'resources/css_udemy/libs/bootstrap.css',
    'resources/css_udemy/libs/bootstrap.min.css',
    'resources/css_udemy/libs/font-awesome.css',
    'resources/css_udemy/libs/metisMenu.css',
    'resources/css_udemy/libs/sb-admin-2.css',
    'resources/css_udemy/libs/styles.css'
],
    'public/css_udemy/libs.css');
//jsquery harus mendahului bootstrap
mix.scripts([
    'resources/js_udemy/libs/jquery.js',
    'resources/css_udemy/libs/bootstrap.js',
    'resources/js_udemy/libs/metisMenu.js',
    'resources/js_udemy/libs/bootstrap.min.js',
    'resources/js_udemy/libs/sb-admin-2.js',
    'resources/js_udemy/libs/scripts.js',
],
    'public/js_udemy/libs.js');

mix.sass('resources/sass/app.scss', 'public/css');
