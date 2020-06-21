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

mix.scripts([
        'public/js/admin/jquery.mCustomScrollbar.concat.min.js',
        'public/js/admin/jquery-1.11.2.min.js',
        'public/js/admin/main.js',
        'public/js/admin/material.min.js',
        'public/js/admin/sweetalert2.min.js',
], 'public/js/admin/all.js');


mix.styles(['public/css/admin/normalize.css',
    'public/css/admin/material.min.css',
    'public/css/admin/main.css',
    'public/css/admin/material-design-iconic-font.min.css',
    'public/css/admin/sweetalert2.css',
    'public/css/admin/jquery.mCustomScrollbar.css',
],'public/css/admin/all.css');

mix.styles(['public/css/store/bootstrap.css',
    'public/css/store/fasthover.css',
    'public/css/store/flexslider.css',
    'public/css/store/font-awesome.css',
    'public/css/store/jquery.countdown.css',
    'public/css/store/popuo-box.css',
    'public/css/store/style.css',
],'public/css/store/all.css');
