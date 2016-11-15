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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46738763-6', 'auto');
      ga('send', 'pageview');

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
            </ul>
              <div class="navbar-right">
                <p class="navbar-text">Signed in as {{ $user['name'] }}</p>
                @if ($user['role_id'] == 1)
                  <a class="btn btn-danger navbar-btn" id="create-btn" data-toggle="modal" data-target="#create-modal">
                      Create Section
                  </a>
                @endif
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

    @if (isset($user) && $user['role_id'] == 1)
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Create Section !</h4>
          </div>
          <div class="modal-body">
            <p>แกสามารถสร้าง Section ขึ้นได้จากการกรอกฟอร์มนี้ *คำเตือน สร้างแล้วรับผิดชอบด้วย*</p>
            <form action="/section/createSection" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label>Start Time</label>
                    <input type="time" class="form-control" name="start">
                  </div>
                  <div class="col-xs-6">
                    <label>End Time</label>
                    <input type="time" class="form-control" name="end">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Due Date</label>
                    <input type="date" class="form-control" name="date">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Room</label>
                    <select class="form-control" name="room" disabled>
                      <option value="1">Train 4 (Network Lab)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Create Section</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif

    {{-- Scripting --}}
    <script type="text/javascript">
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>

    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/vendor/mixitup-master/build/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    {{-- <script type="text/javascript" src="/js/app.js"></script> --}}

  </body>
</html>
