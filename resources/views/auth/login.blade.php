<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Laravel Cms | </title>

    <!-- Bootstrap -->
    <link href="{{asset('lcw/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('lcw/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('lcw/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('lcw/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('lcw/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                {{Form::open(array('route'=>'login'))}}
                    <h1>Login Form</h1>
                    <div>
                        <input name="email" id="email" type="text" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        {{Form::submit('Submit',array('class'=>'btn btn-default submit'))}}
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#" class="to_register"> Create Account </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                {{Form::close()}}
            </section>
        </div>
    </div>
</div>
</body>
</html>
