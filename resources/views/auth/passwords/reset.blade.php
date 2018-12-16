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

<div class="container" style="text-align:center; margin:autofocus">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">  <h1 style="text-align:center"> {{ __('بازیابی رمزعبور') }} </h1> </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.reset') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row form-data form-input">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیک') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-data form-input">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمزعبور') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-data form-input">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تایید رمزعبور') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0 form-data">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('بازیابی رمزعبور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
