@extends('User.Master.mainLayout')
@section('title', 'Register | Dependable Staffing Agency')
@section('content')
<style>
    * {
      box-sizing: border-box;
    }
    
    .columns {
      float: left;
      width: 33.3%;
      padding: 8px;
    }
    
    .price {
      list-style-type: none;
      border: 1px solid #eee;
      margin: 0;
      padding: 0;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }
    
    .price:hover {
      box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }
    
    .price .header {
      background-color: #111;
      color: white;
      font-size: 25px;
    }
    
    .price li {
      border-bottom: 1px solid #eee;
      padding: 20px;
      text-align: center;
    }
    
    .price .grey {
      background-color: #eee;
      font-size: 20px;
    }
    
    .button {
      background-color: #04AA6D;
      border: none;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
    }
    
    @media only screen and (max-width: 600px) {
      .columns {
        width: 100%;
      }
    }
    </style>
    <!--hero section start-->
    <section class="hero-section hero-section-3 pt-50 hero-container pb-0">
        <!--animated circle shape start-->

        <!--animated circle shape end-->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="top-heading ptb-100">
                        <h2 class="font-weight-bold top-heading">Signup Here</h2>
                        <p class="lead">Providing the highest quality
                            and professional services since 1989. </p>
                    </div>
                </div>


            </div>
        </div>


        <!--shape image end-->
    </section>


    <!--hero section start-->
    <section class="hero-section full-screen py-5">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">


                <div class="col-12 col-md-8 col-lg-7 col-xl-7 px-lg-8 my-5">
                    <div class="login-signup-wrap">
                        <!-- Heading -->

                        <h2 class="text-center text-uppercase">Signup</h2>
                        <!-- Form -->
                        <form class="login-signup-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Your Name
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-user color-primary"></span>
                                    </div>
                                    <input name="name" type="text" class="form-control" placeholder="Enter your name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>


                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email Address
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email color-primary"></span>
                                    </div>
                                    <input name="email" type="email" class="form-control" placeholder="name@address.com"
                                        value="{{ old('email') }}" required autocomplete="email">


                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock color-primary"></span>
                                    </div>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Enter your password">


                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Register as an
                                </label>
                                <div class="input-group input-group-merge">
                                    <select name="user_type" class="form-control">
                                        {{-- <select name="user_type" class="form-control" id="openPackages" onchange="openPackages()"> --}}
                                        <option value="Employee">Employee</option>
                                        <option value="Employer">Employer</option>
                                    </select>
                                </div>
                                <label class="form-check-label small text-info" for="exampleCheck1">If you are searching for
                                    job, select employee, else go with employer</label>
                            </div>
                            
                            {{-- <div class="form-group" id="showPakegs" style="display: none">
                               
                               
                                  
                                  <label class="pb-1">
                                    Subscripton Plan
                                </label>
                                <div class="input-group input-group-merge">
                                    <select name="subscription_id" class="form-control">
                                        @php
                                    $packages = DB::table('packages')->get();
                                @endphp
                                @foreach ($packages as $item)
                                        <option value="{{ $item->id }}">{{ $item->package_name }}  ------    ${{  $item->package_price }} / {{  $item->package_type }}</option>
                                 @endforeach       
                                    </select>
                                </div>
                                <label class="form-check-label small text-info" for="exampleCheck1"><a href="{{ route('packages') }}" target="_blank" rel="noopener noreferrer">Check Plan Details</a></label>
                            </div> --}}
                               
                               
                              </div>

                            <div class="form-group form-check d-flex align-items-center text-center">
                                <input name="terms_cond" type="checkbox" class="form-check-input mt-0 mr-3"
                                    id="exampleCheck1">
                                <label class="form-check-label small" for="exampleCheck1">I agree with your  <a
                                        href="{{ route('conditions') }}">terms and conditions</a></label>
                            </div>

                            @if ($errors->has('terms_cond'))
                                <span
                                    class="text-danger">{{ "Please Check Terms & Condition and Accept, It's Required" }}</span>
                            @endif

                            <!-- Submit -->
                            <button  type="submit" class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3">
                                Sign up
                            </button>

                            <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    Already have an account? <a href="{{ route('login') }}">Log in</a>.
                                </small>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div>
    </section>
    <!--hero section end-->
@endsection
@section('openPackages')
    {{-- <script>
        $(document).ready(function(){
                    function openPackages(){
                        d = document.getElementById("openPackages").value;
                        var y = document.getElementById("showPakegs");
                         if(d == "Employer"){
                            y.style.display = "block";
                         }else {
                            y.style.display = "none";

                         }
                    }
    $("#openPackages").on("change", openPackages);
});
    </script> --}}
@endsection
