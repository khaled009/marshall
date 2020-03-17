<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>مرشال</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    {{--   <meta content="Preview page of Metronic Admin RTL Theme #4 for " name="description" />--}}
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!!asset('public/admin/')!!}/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!!asset('public/admin/')!!}/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!!asset('public/admin/')!!}/assets/pages/css/login-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{!!asset('public/admin/')!!}/assets/pages/img/logo-big.png" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('adminlogin') }}" method="post">
        {{ csrf_field() }}
        <h3 class="form-title font-green">تسجيل دخول</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>ادخل الايميل وكلمه المرور </span>
        </div>
        <div class="form-group
                 @if($errors->has('email')) has-error
                 @endif">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">الايميل</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="الايميل"  value="{{ old('email') }}" name="email" />
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group @if($errors->has('password')) has-error @endif">
            <label class="control-label visible-ie8 visible-ie9">كلمه المرور</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" name="password"  value="{{old('password')}}" placeholder="Password" name="password" />

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">دخول</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />تذكرنى
                <span></span>
            </label>

    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->


</div>
<div class="copyright"> {!!date('Y')!!} </div>
<!--[if lt IE 9]>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/respond.min.js"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/excanvas.min.js"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{!!asset('public/admin/')!!}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!!asset('public/admin/')!!}/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{!!asset('public/admin/')!!}/assets/pages/scripts/login.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
</body>

</html>

{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  --}}
