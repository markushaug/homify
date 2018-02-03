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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('resources/assets/img/sidebar-*.jpg', 'public/images');
mix.js('resources/assets/js/auth.js', 'public/js')
   .sass('resources/assets/sass/auth.scss', 'public/css');
mix.js('resources/assets/js/light-bootstrap-dashboard.js', 'public/js')
   .sass('resources/assets/sass/light-bootstrap-dashboard.scss', 'public/css');
mix.extract([
  'lodash', 'chartist', 'jquery',
  'bootstrap-notify', 'bootstrap-select', 'bootstrap-switch',
  'vue', 'axios'
], 'public/js/vendor.js');
mix.version();
