let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//     .sass('resources/assets/sass/app.scss', 'public/css')
//     .version();

mix.combine([
            'public/js/core/jquery.min.js',
            'public/js/core/popper.min.js',
            'public/js/core/bootstrap-material-design.min.js',
            'public/js/plugins/perfect-scrollbar.jquery.min.js',
            'public/js/plugins/moment.min.js',
            'public/js/plugins/sweetalert2.js',
            'public/js/plugins/jquery.validate.min.js',
            'public/js/plugins/jquery.bootstrap-wizard.js',
            'public/js/plugins/bootstrap-selectpicker.js',
            'public/js/plugins/bootstrap-datetimepicker.min.js',
            'public/js/plugins/jquery.dataTables.min.js',
            'public/js/plugins/bootstrap-tagsinput.js',
            'public/js/plugins/jasny-bootstrap.min.js',
            'public/js/plugins/fullcalendar.min.js',
            'public/js/plugins/jquery-jvectormap.js',
            'public/js/plugins/nouislider.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js',
            'public/js/plugins/arrive.min.js',
            'https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE',
            'public/js/plugins/chartist.min.js',
            'public/js/plugins/bootstrap-notify.js',
            'public/js/material-dashboard.js?v=2.1.2" type="text/javascript',
            'public/demo/demo.js',
    ],
    'public/js/all.js');
mix.minify('public/js/all.js');

mix.babel([
            'public/css/material-dashboard.css',
            'public/css/custom.css'

    ],
    'public/css/all.css');
mix.minify('public/css/all.css');
