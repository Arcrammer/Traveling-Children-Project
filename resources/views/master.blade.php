<!DOCTYPE html>
<html>
  <head>
    @if (array_key_exists('title', View::getSections()))
      <title>TCP Passport &raquo; @yield('title')</title>
    @else
      <title>TCP Passport</title>
    @endif

    <!-- Metadata -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Links -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ elixir('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/Main.css') }}">
    @yield('extra_styles')

    <!-- Scripts (These are only the scripts that need to come before the body) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Navigation -->
    @include('shared.navigation')

    <div class="master container">
      @yield('content')
    </div> <!-- .container -->

    <!-- Footer -->
    @include('shared.footer')

    <!-- Scripts (This is where scripts should go in most circumstances) -->
    <script src="{{ elixir('assets/scripts/Main.js') }}"></script>
    @yield('extra_scripts')
  </body>
</html>
