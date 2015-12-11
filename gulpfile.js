var elixir = require('laravel-elixir');
elixir.config.css.outputFolder = 'assets/css';
elixir.config.js.outputFolder = 'assets/scripts';

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
  mix.copy('resources/assets/css/bootstrap.css', 'public/assets/css/bootstrap.min.css');

  // Home
  mix.sass([
    'Main.scss',
    'Home.scss'
  ], 'public/assets/css/Home.css')
  .coffee([
    'Main.coffee',
    'Home.coffee'
  ], 'public/assets/scripts/Home.js');

  // Journeys
  mix.sass([
    'Main.scss',
    'Journeys.scss'
  ], 'public/assets/css/Journeys.css')
  .coffee([
    'Main.coffee',
    'Journeys.coffee'
  ], 'public/assets/scripts/Journeys.js');

  // Errors
  mix.sass('Errors.scss', 'public/assets/css/Errors.css');

  // Versioning
  mix.version([
    // Styles
    'assets/css/Main.css',
    'assets/css/Home.css',
    'assets/css/Journeys.css',
    'assets/css/Errors.css',

    // Scripts
    'assets/scripts/Main.js',
    'assets/scripts/Home.js',
    'assets/scripts/Journeys.js',
    'assets/css/bootstrap.min.css'
  ]);
});
