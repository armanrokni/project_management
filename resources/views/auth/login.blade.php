<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('')}}public/adminPanel/assets/images/favicon_1.ico">

        <title></title>

        <link href="{{asset('')}}public/adminPanel/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}public/adminPanel/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('')}}public/adminPanel/assets/js/modernizr.min.js"></script>

    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> ورود به  <strong class="text-custom">آوند</strong> </h3>
            </div>


            <div class="panel-body" style="margin-top:0px; margin-bottom:20%; margin-right:40%;">
            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group ">
                    <div class="col-xs-5">
                        <input class="form-control" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required="" name="phone" placeholder="{{ __('شماره همراه') }}" value="{{ old('phone') }}" required autofocus>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-5">
                        <input class="form-control" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" name="password" placeholder="{{ __('کلمه عبور') }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-2">
                        <button class="btn btn-green-dark btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('ورود') }}</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ route('password.update') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> {{ __('رمز عبور خود را فراموش کرده‌اید؟') }}</a>
                    </div>
                </div>
            </form>

            </div>
            </div>
        </div>




    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/bootstrap-rtl.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/detect.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/fastclick.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.slimscroll.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.blockUI.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/waves.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/wow.min.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.nicescroll.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.scrollTo.min.js"></script>


        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.core.js"></script>
        <script src="{{asset('')}}public/adminPanel/assets/js/jquery.app.js"></script>

	</body>
</html>
