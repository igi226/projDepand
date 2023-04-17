@extends('User.Master.mainLayout')

@section('title', 'Resources | Dependable Staffing Agency')



@section('content')



    <section class="hero-section hero-section-3 pt-50 hero-container pb-3">

        <!--animated circle shape start-->



        <!--animated circle shape end-->

        <div class="container">

            <div class="row align-items-center justify-content-center py-5">

                <div class="col-md-12 col-lg-12">

                    <div class=" top-heading text-center">

                        <h2 class="top-heading">Resources</h2>

                        <p class="lead">

                            Connecting You with Your Future Today

                        </p>

                        <a href="#resume" class="btn solid-btn inner-btn">Submit

                            Resume</a> &nbsp; &nbsp;<a href="{{ route('employee.allJobs') }}"
                            class="btn solid-btn inner-btn">Search for Jobs</a>

                    </div>

                </div>



            </div>

        </div>







        <!--shape image end-->

    </section>

    <!--hero section start-->



    <section class="hero-section ptb-100  full-screen">

        <div class="container">

            <div class="row align-items-center justify-content-center pt-5 pt-sm-5 pt-md-5 pt-lg-0">

                <div class="col-md-12 col-lg-12 text-center">

                    <div class="card login-signup-card shadow-lg mb-0">

                        <div class="card-body px-md-5 py-5">

                            <div class="mb-5">

                                <h5>At Dependable Staffing, we are committed to matching you with the best jobs in the

                                    market. Complete the form below with your information and take the first step in your

                                    new career.</h5>

                                <h6 class="h3">Submit Resume Form</h6>

                            </div>

                            <form class=" login-signup-form" action="{{ url('submit-resume') }}" method="POST"
                                id="resume" enctype="multipart/form-data">

                                @csrf

                                <div class="row text-left">

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Name <span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="name" value="{{ auth()->user()->name }}"
                                                class="form-control" placeholder=" Name">

                                        </div>

                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Email Address<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="email" name="email" value="{{ auth()->user()->email }}"
                                                class="form-control" placeholder="Email Address">

                                        </div>

                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif

                                    </div>



                                    <!-- Password -->

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Phone Number<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="number" name="number" value="{{ auth()->user()->phone }}"
                                                class="form-control" placeholder="Phone Number">

                                        </div>

                                        @if ($errors->has('number'))
                                            <span class="text-danger">{{ $errors->first('number') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Address<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="address" value="{{ auth()->user()->address }}"
                                                class="form-control" placeholder="Address">

                                        </div>

                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            City<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="city" value="{{ old('city') }}"
                                                class="form-control" placeholder="City">

                                        </div>

                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            State<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="state" value="{{ old('state') }}"
                                                class="form-control" placeholder="State">

                                        </div>

                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Country<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="country" value="{{ old('country') }}"
                                                class="form-control" placeholder="country">

                                        </div>

                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-6">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Zip Code<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="text" name="zipcode" value="{{ old('zipcode') }}"
                                                class="form-control" placeholder="Zip Code ">

                                        </div>

                                        @if ($errors->has('zipcode'))
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        @endif

                                    </div>



                                    <div class="form-group col-lg-12">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Message<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <textarea type="text" name="message" class="form-control" placeholder="Message">{{ old('message') }}</textarea>

                                        </div>

                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-lg-12">

                                        <!-- Label -->

                                        <label class="pb-1">

                                            Resume<span class="text-danger">*</span>

                                        </label>

                                        <!-- Input group -->

                                        <div class="input-group input-group-merge">

                                            <input type="file" name="resume" class="form-control">

                                        </div>

                                        @if ($errors->has('resume'))
                                            <span class="text-danger">{{ $errors->first('resume') }}</span>
                                        @endif

                                    </div>

                                    <div class="col-lg-12 text-center">

                                        <button class="btn btn-lg solid-btn border-radius mt-4 mb-3">

                                            Submit

                                        </button>

                                    </div>

                                    <p class="text-center">Information provided to Dependable Staffing Agency will not be
                                        transferred,

                                        disclosed, or used for marketing purposes.</p>

                                </div>

                            </form>



                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="bottom-img-absolute">

            <img src="img/wave-shap.svg" alt="wave shape" class="img-fluid">

        </div>

    </section>





@endsection

@include('Admin.sweetAlertMsg')
