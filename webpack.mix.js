const mix = require('laravel-mix');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .vue()
    .postCss('resources/assets/sass/app.css', 'public/css')
;
