const mix = require('laravel-mix');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .vue()
    .sass('resources/assets/sass/app.scss', 'public/css')
    // .postCss('resources/assets/sass/app.css', 'public/css', [
    //     //
    // ])
;
