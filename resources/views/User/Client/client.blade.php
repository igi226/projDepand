@extends('User.Master.mainLayout')
@section('title', 'Client | Dependable Staffing Agency')
@section('content')

    <section class="hero-section hero-section-3 pt-50 hero-container pb-3">
        <!--animated circle shape start-->

        <!--animated circle shape end-->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="top-heading ptb-100">
                        <h2 class="font-weight-bold top-heading">{{ $topcms->title }}</h2>
                        <p class="lead">{{ $topcms->short_desc }}</p>
                    </div>
                </div>


            </div>
        </div>


        <!--shape image end-->
    </section>



    <section class="hero-section ptb-100  full-screen">
        <div class="container">
            <div class="row align-items-center justify-content-center pt-5 pt-sm-5 pt-md-5 pt-lg-0">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h5>{{  $midcms->short_desc}}.</h5>
                                <h6 class="h3">{{ $midcms->title }}</h6>
                            </div>
                            <form class=" login-signup-form" action="{{ url('request-talent') }}" method="POST">
                                @csrf
                                <div class="row text-left justify-content-center">
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Job Function
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="jobfunction" value="{{ old('jobfunction') }}" type="text" class="form-control" placeholder="Job Function">
                                           
                                        </div>
                                        @if ($errors->has('jobfunction'))
                                        <span class="text-danger">{{ $errors->first('jobfunction') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Company
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="company" value="{{ old('company') }}" type="text" class="form-control" placeholder="Company">
                                       
                                        </div>
                                        @if ($errors->has('company'))
                                        <span class="text-danger">{{ $errors->first('company') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Position Type
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="positiontype" value="{{ old('positiontype') }}" type="text" class="form-control" placeholder="Position Type">
                                        
                                        </div>
                                        @if ($errors->has('positiontype'))
                                            <span class="text-danger">{{ $errors->first('positiontype') }}</span>
                                        @endif
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Position Hiring For
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="position_hiring_for" value="{{ old('position_hiring_for') }}" type="text" class="form-control" placeholder="Position Hiring For">
                                        
                                        </div>
                                        @if ($errors->has('position_hiring_for'))
                                            <span class="text-danger">{{ $errors->first('position_hiring_for') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Email Address
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email Address">
                                        
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            First Name
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="fname" value="{{ old('fname') }}" type="text" class="form-control" placeholder="First Name">
                                        
                                        </div>
                                        @if ($errors->has('fname'))
                                            <span class="text-danger">{{ 'first name is required' }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Last Name
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="lname" value="{{ old('lname') }}" type="text" class="form-control" placeholder="Last Name">
                                        
                                        </div>
                                        @if ($errors->has('lname'))
                                            <span class="text-danger">{{ 'last name is required' }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Job Title
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="jobtitle" value="{{ old('jobtitle') }}" type="text" class="form-control" placeholder="Job Title">
                                        
                                        </div>
                                        @if ($errors->has('jobtitle'))
                                            <span class="text-danger">{{ $errors->first('jobtitle') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Phone Number
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="number" value="{{ old('number') }}"  type="text" class="form-control" placeholder="Phone Number">
                                       
                                        </div>
                                        @if ($errors->has('number'))
                                        <span class="text-danger">{{ $errors->first('number') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Address
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="address" value="{{ old('address') }}"  type="text" class="form-control" placeholder="Address ">
                                        
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            City
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="city" value="{{ old('city') }}" type="text" class="form-control" placeholder="City">
                                        
                                        </div>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            State
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="state" value="{{ old('state') }}" type="text" class="form-control" placeholder="State">
                                        
                                        </div>
                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Country
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="country"  value="{{ old('country') }}" type="text" class="form-control" placeholder="Country">
                                       
                                        </div>
                                        @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Zip Code
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="zipcode" value="{{ old('zipcode') }}" type="text" class="form-control" placeholder="Zip Code">
                                        
                                        </div>
                                        @if ($errors->has('zipcode'))
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-lg-12">
                                        <!-- Label -->
                                        <label class="pb-1">
                                            Message
                                        </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input  name="message" value="{{ old('message') }}" type="text" class="form-control" placeholder="Message">
                                        
                                        </div>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group col-lg-6 text-center">
                                        <button type="submit" class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3 text-center">
                                            Submit
                                        </button>
                                    </div>
                                    <p><?php echo html_entity_decode($midcms->description);?></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute">
            <img src="{{ asset('userAsset/img/wave-shap.svg') }}" alt="wave shape" class="img-fluid">
        </div>
    </section>

@endsection
@include('Admin.sweetAlertMsg')

