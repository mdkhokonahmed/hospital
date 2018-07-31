<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{'public/pages/'}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{'public/pages/'}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{'public/pages/'}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{'public/pages/'}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'login', 'method'=>'POST']) !!}
                            <fieldset>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                                   

 {{Form::text('email', null, ['class'=>'form-control','placeholder'=>'Type Email'])}}

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                   
 {{Form::password('password', ['class'=>'form-control','placeholder'=>'Type password'])}}

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                
          {{Form::submit('Login',['name'=>'btn', 'class'=>'btn btn-primary btn-block'])}}
                                </div>
                                
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{'public/pages/'}}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{'public/pages/'}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{'public/pages/'}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{'public/pages/'}}/dist/js/sb-admin-2.js"></script>

</body>

</html>
