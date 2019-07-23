const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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
  .js('resources/js/app.js', 'public/js')
mix
  .js('resources/js/fwe-s1.js', 'public/js')
mix
  .js('resources/js/dab-fcr-s1.js', 'public/js')
mix
  .js('resources/js/dab-fed-s1.js', 'public/js')
mix
  .js('resources/js/dab-fsh-s1.js', 'public/js')
mix
  .js('resources/js/dim-fin-s1.js', 'public/js')
mix
  .js('resources/js/dpo-fcr-s1.js', 'public/js')
mix
  .js('resources/js/dpo-fed-s1.js', 'public/js')
mix
  .js('resources/js/dpo-fed-s2.js', 'public/js')
mix
  .js('resources/js/dpo-fsh-s1.js', 'public/js')
mix
  .js('resources/js/dpo-fsh-s2.js', 'public/js')
mix
  .js('resources/js/dpo-fsh-s3.js', 'public/js')
mix
  .js('resources/js/dyc-fin-s1.js', 'public/js')
mix
  .postCss('resources/css/main.css', 'public/css', [
        require('tailwindcss'),
  ])
  .copyDirectory('resources/fonts', 'public/fonts');