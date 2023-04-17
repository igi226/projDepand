<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('adminAsset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAsset/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAsset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAsset/css/lib/themify-icons.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
    <div>

  
    <section class="vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="border bg-white shadow p-4">
                        <div class="row">
                            <div class="col-sm-6 text-black p-0">
                                <img src="{{ asset('userAsset/img/logo.png') }}" alt="logo" class="img-logo ml-5">
                            <div class="p-4">
                               

                                <form method="POST" action="{{ url('admin') }}" style="width: 23rem;">
                    @csrf
                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                    
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example18">Email address</label>
                                    
                                    <input type="email" id="form2Example18" class="form-control form-control-lg" name="admin_email" />
                                    @if ($errors->has('admin_email'))
                                    <span class="text-danger">{{ $errors->first('admin_email') }}</span>
                                    @endif
                                </div>
                    
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example28">Password</label>
                                   
                                    <div class="position-relative">
                                        <input id="adminpassword" type="password" id="form2Example28" class="form-control form-control-lg" name="password" />
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        <span class="password-icon" onclick="password_show_hide();">
                                            <i class="ti-lock" id="show_eye"></i>
                                            <i class="ti-unlock d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                    
                                <div class="form-outline mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                                </div>
                    
                                {{-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                                <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p> --}}
                    
                                </form>
                    
                            </div>
                    
                            </div>
                            <div class="col-sm-6 px-0 d-none d-sm-block p-0">
                            <img src="{{ asset('userAsset/img/about-img.png') }}"
                                alt="Login image" class="w-100" style="object-fit: cover; object-position: left;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('adminAsset/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminAsset/js/scripts.js') }}"></script>
    <script>
        @if($msg = session('msg'))
        swal("{{ $msg }}");
        @endif
    </script>
    <script>
        function password_show_hide() {
          var x = document.getElementById("adminpassword");
          var show_eye = document.getElementById("show_eye");
          var hide_eye = document.getElementById("hide_eye");
          hide_eye.classList.remove("d-none");
          if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
          } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
          }
        }
        </script>
</body>
</html>