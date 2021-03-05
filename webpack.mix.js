const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 //for admin app
mix.js('resources/js/app.js', 'public/js').vue({ version: 2 })
    .postCss('resources/css/app.css', 'public/css', [
    ]);

//for company app    
mix.js('resources/js/companyApp.js', 'public/js').vue({ version: 2 })
    .postCss('resources/css/companyApp.css', 'public/css', [
   ]); 
   
//for employee app    
mix.js('resources/js/employeeApp.js', 'public/js').vue({ version: 2 })
    .postCss('resources/css/employeeApp.css', 'public/css', [
   ]); 