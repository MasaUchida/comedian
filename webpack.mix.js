let mix = require('laravel-mix');

mix
  .sass('src/sass/style.scss', './style.css')
  .options({
      processCssUrls: false
   });

mix
  .sass('src/sass/Foundation/_reset.scss', './reset.css')
  .options({
       processCssUrls: false
    });