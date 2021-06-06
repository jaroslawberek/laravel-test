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
mix.scripts(['resources/js/jsCrud.js'], 'public/js/jsCrud.js')
   .scripts(['resources/js/jsWebAplication.js'], 'public/js/jsWebAplication.js')
   .scripts(['resources/js/app.js'], 'public/js/app.js')
   .scripts(['resources/js/all.js'], 'public/js/all.js')
   .scripts(['resources/js/backend.js'], 'public/js/backend.js')
   
   .sass('resources/sass/frontend/test1.scss', 'public/css')
   .sass('resources/sass/frontend/sassCrud.scss', 'public/css')
   .sass('resources/sass/frontend/crud_form.scss', 'public/css')
   .sass('resources/sass/frontend/app.scss', 'public/css')
   .sass('resources/sass/backend/admin.scss', 'public/css')
   .options({
      processCssUrls: false /* Lecture 4 */
   });

