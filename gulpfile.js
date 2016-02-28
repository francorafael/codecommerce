var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'prettyPhoto.css',
        'animate.css',
        'main.css',
        'responsive.css'
    ], 'public/css/all.css');

    mix.styles([
        'bootstrap.min.css',
        'ie10-viewport-bug-workaround.css',
        'dashboard.css',
        'ie-emulation-modes-warning.js'
    ], 'public/css/all-admin.css');

    mix.scripts([
        'jquery.js',
        'jquery-1.12.0.min.js',
        'cart.js',
        'bootstrap.min.js',
        'jquery.scrollUp.min.js',
        'price-range.js',
        'jquery.prettyPhoto.js',
        'main.js'
    ], 'public/js/all.js');

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'holder.min.js',
        'ie10-viewport-bug-workaround.js'
    ], 'public/js/all-admin.js');

    mix.version(['css/all.css', 'js/all.js', 'css/all-admin.css', 'js/all-admin.js']);

    //COPIA QUALQUER TIPO DE ASSETS
    mix.copy('resources/assets/fonts', 'public/build/fonts');
});
