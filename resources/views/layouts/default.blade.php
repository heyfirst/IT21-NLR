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
    <link rel="stylesheet" href="/css/app.css">

    {{-- Head Script --}}
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

    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Network Lab Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Reservation</a></li>
          </ul>
          @if (isset($user))
            <div class="navbar-right">
              <p class="navbar-text">Signed in as {{ $user['name'] }}</p>
              <a class="btn btn-warning navbar-btn" href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          @endif
        </div>
      </div>
    </nav>

    @yield('content')
    {{-- Scripting --}}
    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

  </body>
</html>
