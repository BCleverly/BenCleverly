const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');
require('mix-tailwindcss');

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
    .sass('resources/scss/public/app.scss', 'public/css')
    .tailwind('./tailwind.config.js')

    .copy('node_modules/@fortawesome/fontawesome-pro/webfonts', 'public/fonts')

    .extract(['vue', 'flatpickr', 'axios', 'highlight.js', 'highlight.js/styles/dracula.css', 'simplemde/src/css/simplemde.css', 'simplemde', '@ckeditor/ckeditor5-build-classic'])

    .options({processCssUrls: false});

if (mix.inProduction()) {
    mix
        .purgeCss({
            whitelist: ['img']
        })
        .version();
}
