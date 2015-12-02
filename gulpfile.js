var elixir = require('laravel-elixir');
elixir.config.css.outputFolder = 'assets/css'
elixir.config.js.outputFolder = 'assets/js'

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
  // Bootstrap
  mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/assets/js/bootstrap.min.js');

  // Home
  mix.sass('Main.scss')
  .coffee('Home.coffee');

  // Versioning
  mix.version([
    // Styles
    'assets/css/Main.css',

    // Scripts
    'assets/js/bootstrap.min.js',
    'assets/js/Home.js'
  ]);
});
