var elixir = require('laravel-elixir');
elixir.config.assetsDir = 'public/assets/';
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

// elixir(function(mix) {
//     mix.sass('app.scss');
// });

elixir(function(mix) {
    mix.styles([
        'bootstrap.css',
        'font-awesome.min.css',
        'materialize.css',
        'slick.css',
        'magnific-popup.css',
        'nprogress.css',
        'toastr.min.css',
        'step-form-wizard-all.css',
        'dropzone.css',
        'style.css'
    ],'public/assets/css/','public/assets/css/');
});

elixir(function(mix) {
    mix.scripts([
        'jquery-2.2.2.min.js',
        'bootstrap.min.js',
        'materialize.min.js',
        'slick.min.js',
        'main.js',
        'nouislider.min.js',
        'step-form-wizard.js',
        'wNumb.min.js',
        'jquery.magnific-popup.min.js',
        'theia-sticky-sidebar.js',
        'nprogress.js',
        'toastr.min.js',
        'jquery.validate.js',
        'custom.js'

    ],'public/assets/js/','public/assets/js/');
});