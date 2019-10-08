<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Armonya | login">
    <meta name="author" content="Jrb">

    <title>Armonya | Login</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="/backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="/backend/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/backend/assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="/backend/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="/backend/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="/backend/assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="/backend/assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->

    <!--custom styles-->
    <link href="/backend/assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/backend/assets/vendor/html5shiv.js"></script>
    <script src="/backend/assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin-up-bg">

    <div class="leftHalf" style="background-image: url('https://new.usgbc.org/sites/default/files/hero/2017-07/about.jpg')">
        <div class="login-promo-txt">
            <h2>L'importance d'un choix</h2>
            <p> <h3>C'est de faire le bon</h3></p>
        </div>
    </div>

    <div class="rightHalf">
        <div class="position-relative">
            <!--login form-->
            <div class="login-form">
                <h2 class="text-center mb-4">
                    <img src="/common/logo.png" srcset="/common/logo@2x.jpg 2x" alt="Armonya">
                </h2>
                <p>Veuillez remplir le formulaire pour accéder à l'application.</p>
                <form method="POST" action="{{ route('login') }}" style="margin-top: 20px;">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label ">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label ">Mot de passe</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-pill float-right" style="background-color: #4cc3fe; color: white;">LOGIN</button>
                    </div>
                </form>
            </div>
            <!--/login form-->
        </div>
    </div>

    <!--basic scripts-->
    <script src="/backend/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/backend/assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="/backend/assets/vendor/popper.min.js"></script>
    <script src="/backend/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/backend/assets/vendor/icheck/skins/icheck.min.js"></script>

    <!--[if lt IE 9]>
    <script src="/backend/assets/vendor/modernizr.js"></script>
    <![endif]-->
</body>
</html>

