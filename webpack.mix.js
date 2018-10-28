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

mix.js('resources/assets/js/app.js', 'public/assets/js/bundle.js')
   .sass('resources/assets/sass/app.scss', 'public/assets/css/bundle.css');

mix.styles([
	'node_modules/bootstrap/dist/css/bootstrap.css',
	'node_modules/jqueryui/jquery-ui.min.css',
	'resources/assets/css/default/style.css',
	'resources/assets/css/custom.css',
	], 'public/assets/css/bundle.css');

// img
mix.copy('resources/assets/img/', 'public/assets/img/');

// js
mix.copy('resources/assets/js/', 'public/assets/js/');

// css
mix.copy('resources/assets/css/', 'public/assets/css/');


// for those plugins which is not listed in npm
mix.copy('resources/assets/plugins/', 'public/assets/plugins/');