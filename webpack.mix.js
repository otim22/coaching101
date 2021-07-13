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

 const domain = 'coaching101.app';
 const homedir = require('os').homedir();

 mix.scripts([
    'node_modules/card-js/card-js.min.js',
],  'public/js/card-js.js')

.styles([
    'node_modules/card-js/card-js.min.css',
],  'public/css/card-js.css');

mix.js('resources/js/app.js', 'public/js/')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/custom.scss', 'public/admin/css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts');

mix.browserSync({
    proxy: 'https://' + domain,
    host: domain,
    open: 'external',
    https: {
        key: homedir + '/.config/valet/Certificates/' + domain + '.key',
        cert: homedir + '/.config/valet/Certificates/' + domain + '.crt',
    },
});
