@extends('User.Master.mainLayout')
@section('title', 'Facilities | Dependable Staffing Agency')
@section('content')
    <section class="hero-section hero-section-3 pt-50 hero-container pb-3">
        <!--animated circle shape start-->
        <!--animated circle shape end-->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="top-heading ptb-100">
                        <h2 class="font-weight-bold top-heading">Patient Referrals</h2>
                        <p class="lead">Providing Expert Care Solutions for Washington State </p>
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
                            <div class="mb-5"> <a class="" href="{{ url('facilities') }}"><img
                                        src="{{ asset('userAsset/img/logo.png') }}" width="200" alt="logo"
                                        class="img-fluid"></a> <br><br>
                                <h5>Excellent health care doesn’t stop when the patient leaves your office. With our patient
                                    referral program, you can find the right healthcare professional for all of your
                                    patients’ needs today, tomorrow, and well into the future. Fill out the form below so we
                                    can help you help others.</h5>
                                <h6 class="h3">Patient Referrals Form</h6>
                            </div>
                            <form class=" login-signup-form" method="POST" action="{{ route('patient.refferel') }}">
                                @csrf


                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> First Name: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            <input name="first_name" value="{{ old('first_name') }}" type="text"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Last Name: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="last_name"
                                                value="{{ old('last_name') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="phone"
                                                value="{{ old('phone') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="email"
                                                value="{{ old('email') }}" type="email" class="form-control"> </div>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> POA First Name: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="poa_first_name"
                                                value="{{ old('poa_first_name') }}" type="text" class="form-control">
                                        </div>
                                        @if ($errors->has('poa_first_name'))
                                            <span class="text-danger">{{ $errors->first('poa_first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> POA Lasr Name: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="poa_last_name"
                                                value="{{ old('poa_last_name') }}" type="text" class="form-control">
                                        </div>
                                        @if ($errors->has('poa_last_name'))
                                            <span class="text-danger">{{ $errors->first('poa_last_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> POA Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="poa_phone"
                                                value="{{ old('poa_phone') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('poa_phone'))
                                            <span class="text-danger">{{ $errors->first('poa_phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> E-mail: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="e_mail"
                                                value="{{ old('e_mail') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('e_mail'))
                                            <span class="text-danger">{{ $errors->first('e_mail') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Address: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="address"
                                                value="{{ old('address') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> City: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="city"
                                                value="{{ old('city') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> State: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="state"
                                                value="{{ old('state') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> ZIP Code: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="zipcode"
                                                value="{{ old('zipcode') }}" type="text" class="form-control"> </div>
                                        @if ($errors->has('zipcode'))
                                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Diagnosis: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="diagnosis"
                                                value="{{ old('diagnosis') }}" type="text" class="form-control">
                                        </div>
                                        @if ($errors->has('diagnosis'))
                                            <span class="text-danger">{{ $errors->first('diagnosis') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-12">
                                        <h6>Please select all that may apply :</h6>
                                    </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Nurses"> <label for="vehicle1">
                                            Nurses</label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Physical Therapy"> <label
                                            for="vehicle1">
                                            Physical Therapy</label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Occupational Therapy"> <label
                                            for="vehicle1">
                                            Occupational Therapy</label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Speech Therapy "> <label
                                            for="vehicle1">
                                            Speech Therapy </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Hospital"> <label for="vehicle1">
                                            Medical Social Worker </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Home Health Aide-Certified"> <label
                                            for="vehicle1"> Home Health Aide-Certified </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="24 Hour Live In"> <label
                                            for="vehicle1"> 24 Hour Live In
                                        </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Sitters/Companion"> <label
                                            for="vehicle1"> Sitters/Companion </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Medication Assistants"> <label
                                            for="vehicle1">
                                            Medication Assistants </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Shopping and Errands"> <label
                                            for="vehicle1">
                                            Shopping and Errands </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Bathing"> <label
                                            for="vehicle1">
                                            Bathing </label><br> </div>
                                            <div class="form-group col-lg-6"> <input name="patientrefferal[]" type="checkbox"
                                                id="vehicle1" name="vehicle1" value="Sleepovers"> <label
                                                for="vehicle1">
                                                Sleepovers </label><br> </div>
                                   
                                    @if ($errors->has('patientrefferal'))
                                        <span class="text-danger">{{ $errors->first('patientrefferal') }}</span>
                                    @endif
                                    
                                </div>
                                <hr>
                                
                                    
                                    <div class="form-group col-lg-12">
                                        <!-- Label --> <label class="pb-1"> Complete Plan of Care :
                                        </label> <!-- Input group -->
                                        <div class="input-group input-group-merge">
                                            {{-- <textarea  placeholder=" "></textarea> --}}
                                            <input name="complete_plan_care" class="form-control" type="text" name="" value="{{ old('complete_plan_care') }}">
                                        </div>
                                        @if ($errors->has('complete_plan_care'))
                                            <span class="text-danger">{{ $errors->first('complete_plan_care') }}</span>
                                        @endif
                                    </div>
                                    
                               
                                <div class="row text-left pb-50 justify-content-center">
                                    <!-- Submit -->
                                    <div class="form-group col-lg-6"> <button type="submit"
                                            class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3"> Submit
                                        </button>
                                        <!-- <p>Information provided to Dependable Staffing Agency will not be transferred, disclosed, or used for marketing purposes</p> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute"> <img src="img/wave-shap.svg" alt="wave shape" class="img-fluid"> </div>
    </section>
@endsection
@include('Admin.sweetAlertMsg')
