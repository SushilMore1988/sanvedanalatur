<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <title>Login</title>
    <link href="{{url('vendor/datatables/datatables.min.css')}}" rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="{{url('vendor/taginput/taginput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('vendor/multi-select/multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <script type="text/javascript" src="{{url('vendor/multi-select/multiselect.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    <script type="text/javascript" src="{{url('vendor/taginput/taginput.js')}}"></script>
    <style type="text/css">
        body {
          overflow-x: hidden;
        }
    </style>
</head>
<body>
    <header class="home-header fixed-top bg-white" >
        <div class="container-fluid ">
            <nav class="navbar px-0 justify-content-between align-items-center">
                <a class="navbar-brand p-semibold text-primary text-left" href="{{route('home')}}"> 
                    <img src="{{url('img/logoeng.png')}}" class="img-fluid">
                </a>
            </nav>
        </div>
    </header>
    
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="register-mt position-relative common-mt ">
        <div class="container">
            <div class="register-create d-flex flex-column justify-content-center">
                <div class="align-self-center w-100">
                    <div class="register-banner d-flex flex-column justify-content-center background-none">
                        <div class="register-form  ">
                            <div class="row align-self-center">
                                <div class="col-lg-6 col-md-8 mx-auto  align-self-center">
                                    <h1 class="p-medium f-36 text-home-register ">LogIn</h1>
                                        @if ($errors->first('phone'))
                                            <span role="alert">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                        <div class="row">
                                            <div class="col-12 py-2">
                                                <div id="super_admin_div">
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                                        <div class="py-2">
                                                            <input type="text" class="w-100 form-control shadow-sm px-3" name="phone" id="phone" placeholder="Mobile Number" >
                                                        </div>
                                                        <div class="py-2">
                                                            <div class="input-group mb-3 position-relative">
                                                                <input type="password" class="w-100 form-control shadow-sm px-3" name="password" id="password" placeholder="Enter password  *" aria-label="password" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password "></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 py-md-2 text-right">
                                                            <button type="submit" class="btn btn-primary f-12 p-semibold rounded-9 text-right">LogIn</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6 col-md-8 mx-auto outer-field text-center d-md-block d-none">
                                    <img src="{{url('img/aa.png')}}" class="img-fluid mx-auto login-banner ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $('#password');
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>
</html>