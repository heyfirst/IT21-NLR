<!DOCTYPE html>
<html>
  <head>
    {{-- Basic Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    {{-- Favicons --}}

    {{-- ! CSS ! --}}
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css" media="screen" title="no title">

    {{-- Head Script --}}

  </head>
  <body>

    <div class="container">
      @yield('content')
    </div>

    {{-- Scripting --}}
    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

  </body>
</html>
