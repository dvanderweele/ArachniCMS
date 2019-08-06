const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
let glob = require("glob-all");
let PurgecssPlugin = require("purgecss-webpack-plugin");
require('laravel-mix-purgecss');


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

class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
  }
}

mix
  .js('resources/js/app.js', 'public/js')
mix
.js('resources/js/theme-switch.js', 'public/js')
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
  .copyDirectory('resources/fonts', 'public/fonts')
  .purgeCss();

if (mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      new PurgecssPlugin({

        // Specify the locations of any files you want to scan for class names.
        paths: glob.sync([
          path.join(__dirname, "resources/views/**/*.blade.php"),
          path.join(__dirname, "resources/*.blade.php")
        ]),
        extractors: [
          {
            extractor: TailwindExtractor,

            // Specify the file extensions to include when scanning for
            // class names.
            extensions: ["html", "js", "php", "vue"]
          }
        ]
      })
    ]
  });
}