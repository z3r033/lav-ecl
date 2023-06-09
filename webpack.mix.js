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

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();*/

   mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css',[

    ]); 
    mix.js('resources/js/map.js', 'public/js').postCss('resources/css/map.css', 'public/css',[
 /*        require('postcss-import'),
        require('tailwindcss'), */
    ]); 

    
/* mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/components/map.js', 'public/js/components')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/components/map.css', 'public/css/components',[
        //
            ]); */
