const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue()
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ])
  // Ensure you have this line

if (mix.inProduction()) {
    mix.version();
}

