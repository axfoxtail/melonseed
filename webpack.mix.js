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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/front/app-front.scss', 'public/css/front')
    .sass('resources/sass/front/activities.scss', 'public/css/front')
    .sass('resources/sass/front/activity-detail.scss', 'public/css/front')
    .sass('resources/sass/front/home.scss', 'public/css/front')
    .sass('resources/sass/front/profile-edit.scss', 'public/css/front')
    .sass('resources/sass/front/provider-create.scss', 'public/css/front')
    .sass('resources/sass/front/provider-featured.scss', 'public/css/front')
    .sass('resources/sass/admin/app-admin.scss', 'public/css/admin')
    .sass('resources/sass/admin/provider-edit.scss', 'public/css/admin');