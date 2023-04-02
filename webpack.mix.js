const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('./nova.mix');

mix.setPublicPath('dist')
  .js('resources/js/card.js', 'js')
  .vue({ version: 3 })
  .postCss('resources/css/card.css', 'css', [
    tailwindcss
  ])
  .nova('falbar/nova-card-log');
