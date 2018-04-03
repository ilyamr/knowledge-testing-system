var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix) {
    mix.less('app.less');
});

elixir(function(mix) {
   mix.react('resources/assets/js', 'public/js/react-app.js');
});

elixir(function(mix) {
    mix.browserify('app.js', 'public/js/react-app.js');
});