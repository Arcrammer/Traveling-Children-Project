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
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ elixir('assets/css/Main.css') }}">
  </head>
  <body>
    <!-- Navigation -->
    @include('shared.navigation')

    <div class="container">
      @yield('content')
    </div> <!-- .container -->

    <!-- Footer -->
    @include('shared.footer')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ elixir('assets/js/bootstrap.min.js') }}"></script>
    @yield('extra_scripts')
  </body>
</html>
