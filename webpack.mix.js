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
    .sourceMaps();


mix.copy('node_modules/devextreme/dist/css/dx.common.css', 'public/css')
mix.copy('node_modules/devextreme/dist/css/dx.light.css', 'public/css')
mix.copy('node_modules/devextreme/dist/css/dx.darkviolet.css', 'public/css')
mix.copy('node_modules/devextreme/dist/js/dx.all.js', 'public/js')
mix.copy('node_modules/devextreme/dist/js/FileSaver.js', 'public/js')
mix.copy('node_modules/jszip/dist/jszip.min.js', 'public/js')
mix.copy('node_modules/devextreme/dist/js//localization/dx.messages.it.js', 'public/js')
mix.copy('node_modules/devextreme/dist/js/dx.aspnet.mvc.js', 'public/js')
mix.copy('node_modules/devextreme/esm/aspnet.js', 'public/js/esm')
mix.copy('node_modules/devextreme/cjs/aspnet.js', 'public/js')
mix.copy('node_modules/devextreme-aspnet-data/js/dx.aspnet.data.js', 'public/js')

