<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootflat_dist/bootflat.min.css">
    <link rel="stylesheet" href="vendor/components-font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">
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
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-2">
          <p class="navbar-text">Signed in as Mark Otto</p>
        </div>
      </div>
    </nav>

    <div class="container reservation">
      <h4>MONDAY 14 NOV 59</h4>
      <div class="row">
        <div class="col-xs-4">
          <div class="panel">
            <span class="badge badge-info">เหลือ 3 ที่</span>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-6 text-right">
                  <h3>ROUND 1</h3>
                  <h4 class="time">START <span>16:30</span></h4>
                  <h4 class="time">END <span>18:00</span></h4>
                  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">BOOKING</button>
                </div>
                <div class="col-xs-6">
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal --}}

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
          </div>
          <div class="modal-body">
            ...
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="../vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>

  </body>
</html>
