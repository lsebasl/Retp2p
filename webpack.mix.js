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
mix.styles(['public/css/admin/app.css',
    ],'public/css/admin/all2.css');

mix.scripts([
        'resources/js/admin/jquery.mCustomScrollbar.concat.min.js',
        'resources/js/admin/jquery-1.11.2.min.js',
        'resources/js/admin/main.js',
        'resources/js/admin/material.min.js',
        'resources/js/admin/sweetalert2.min.js',
], 'public/js/admin/all.js');

mix.scripts([
    'resources/js/store/jquery.min.js',
    'resources/js/store/jquery.countdown.js',
    'resources/js/store/jquery.flexisel.js',
    'resources/js/store/jquery.jquery.flexslider.js',
    'resources/js/store/jquery.jquery.magnific-popup.js',
    'resources/js/store/jquery.wmuSlider.js',
    'resources/js/store/minicart.js',
    'resources/js/store/easyResponsiveTabs.js',
    'resources/js/store/imagezoom.js',
    'resources/js/store/script.js',
    'resources/js/store/bootstrap-3.1.1.min.js',

], 'public/js/store/all.js');

mix.scripts([
    'resources/js/store/minicart.js',
], 'public/js/store/minicart.js');


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

mix.styles([
    'public/css/checkout/style.css',
],'public/css/checkout/all.css');

mix.scripts(['public/js/checkout/classie.js',
    'public/js/checkout/imagezoom.js',
    'public/js/checkout/jquery.flexslider.js',
    'public/js/checkout/jquery.min.js',
    'public/js/checkout/main.js',
    'public/js/checkout/memenu.js',
    'public/js/checkout/responsiveslides.min.js',
    'public/js/checkout/simpleCart.min.js',
    'public/js/checkout/uisearch.js',
],'public/js/checkout/all.js');



