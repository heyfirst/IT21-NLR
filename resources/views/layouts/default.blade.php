<!DOCTYPE html>
<html>
  <head>
    {{-- Basic Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT21 : Reservation</title>

    {{-- Favicons --}}

    {{-- ! CSS ! --}}
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootflat_dist/bootflat.min.css">
    <link rel="stylesheet" href="/vendor/components-font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="/css/app.css">

    {{-- Head Script --}}
    <script type="text/javascript">
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1417996658499618',
          xfbml      : true,
          version    : 'v2.8'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Network Lab Reservation<sup>BETA</sup></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if (isset($user))
            <ul class="nav navbar-nav">
              <li class="active"><a href="/reservation">Reservation</a></li>
              <li class=""><a href="/profile">My Booking</a></li>
            </ul>
              <div class="navbar-right">
                <p class="navbar-text">Signed in as {{ $user['name'] }}</p>
                <a class="btn btn-warning navbar-btn" href="{{ url('/logout') }}">
                    Logout
                </a>
              </div>
            @endif
          </div>
        </div>
      </nav>

      @yield('content')
    </div>

    {{-- Scripting --}}
    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

  </body>
</html>
