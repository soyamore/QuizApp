<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8;FF=3;OtherUA=4" />
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <meta charset="utf-8" />
    <title>Connexion - Quizapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="{{ asset('pages/pages/ico/60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/pages/ico/76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/pages/ico/120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/pages/ico/152.png') }}">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
  
    <link rel="stylesheet" type="text/css" href="{!! asset('pages/assets/plugins/boostrapv3/css/bootstrap.min.css') !!}">
    <link href="{!! asset('pages/pages/css/pages.min.css') !!}" rel="stylesheet" type="text/css" />

    <!--[if lte IE 9]>
    <link href="{{ asset('pages/pages/css/ie9.css') }}" rel="stylesheet" type="text/css" />
    <![endif]-->

    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{!! asset('pages/pages/css/windows.chrome.fix.css') !!}" />'
    }
    </script>
  </head>
  <body class="fixed-header">
    <div class="register-container full-height sm-p-t-30">
      <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <div style="margin-top:-50px;margin-bottom:30px;">
              <h1 style="margin-bottom: 2px">
                <span style="color:#0da899;">Quiz</span>app
              </h1>
              <p style="color: #626262; font-size: 9pt" stype="">
                Evaluation des compètences
              </p>
            </div>
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            <form id="form-login" class="p-t-15" role="form" action="{{ URL::to('login') }}" method="post" style="padding-top: 0 !important;">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username" autocomplete="off" class="form-control" required>
                  </div>
                  <div class="form-group form-group-default">
                    <label>Mot de passe</label>
                    <input type="password" name="password" autocomplete="off" autocomplete="off" class="form-control" required>
                  </div>

                </div>
              </div>
              {!! Form::token() !!}
              
              <button class="btn btn-primary btn-cons m-t-10" type="submit" style="background-color: #0da899; border-color: #168f63;">Connexion</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>