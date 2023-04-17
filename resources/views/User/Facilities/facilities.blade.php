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
                        <h2 class="font-weight-bold top-heading">Facilities</h2>
                        <p class="lead">Providing the highest quality and professional services since 1989. </p>
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
                                <h5>At Dependable Staffing, we are committed to matching you with the most qualified
                                    individuals for your company’s needs. Complete the form below with your information to
                                    find the right professional today.</h5>
                                <h6 class="h3">Facility Intake Form</h6>
                            </div>
                            <form class=" login-signup-form" method="POST" action="{{ url('facility-intake-forms') }}">
                                @csrf <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Company Name: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input type="text"
                                                name="company_name" value="{{ auth()->user()->company_name }}" class="form-control"
                                                placeholder="Company Name:"> </div>
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> EIN Number: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="ein_number"
                                                value="{{ old('ein_number') }}" type="number" class="form-control"
                                                placeholder="EIN Number: "> </div>
                                        @if ($errors->has('ein_number'))
                                            <span class="text-danger">{{ $errors->first('ein_number') }}</span>
                                            @endif
                                    </div> <!-- Password -->
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Dun & Bradstreet Number: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="dun_bradstreet_number"
                                                value="{{ old('dun_bradstreet_number') }}" type="number"
                                                class="form-control" placeholder="Dun & Bradstreet Number: "> </div>
                                        @if ($errors->has('dun_bradstreet_number'))
                                            <span class="text-danger">{{ $errors->first('dun_bradstreet_number') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Authorized Company Representative Name and
                                            Title: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="auth_company_rep_name"
                                                value="{{ old('auth_company_rep_name') }}" type="text"
                                                class="form-control"
                                                placeholder="Authorized Company Representative Name and Title: "> </div>
                                        @if ($errors->has('auth_company_rep_name'))
                                            <span class="text-danger">{{ $errors->first('auth_company_rep_name') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="company_phone"
                                                value="{{auth()->user()->phone }}" type="text" class="form-control"
                                                placeholder="Phone:"> </div>
                                        @if ($errors->has('company_phone'))
                                            <span class="text-danger">{{ $errors->first('company_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6 ">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="company_email"
                                                value="{{ auth()->user()->email  }}" type="text" class="form-control"
                                                placeholder="Email:"> </div>
                                        @if ($errors->has('company_email'))
                                            <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Facility Name: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_name"
                                                value="{{ auth()->user()->name }}" type="text" class="form-control"
                                                placeholder="Facility Name:"> </div>
                                        @if ($errors->has('facility_name'))
                                            <span class="text-danger">{{ $errors->first('facility_name') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Address: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_address"
                                                value="{{ auth()->user()->address }}" type="text" class="form-control"
                                                placeholder="Address:"> </div>
                                        @if ($errors->has('facility_address'))
                                            <span class="text-danger">{{ $errors->first('facility_address') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_phone"
                                                value="{{ auth()->user()->phone }}" type="text" class="form-control"
                                                placeholder="Phone: "> </div>
                                        @if ($errors->has('facility_phone'))
                                            <span class="text-danger">{{ $errors->first('facility_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_fax"
                                                value="{{ old('facility_fax') }}" type="text" class="form-control"
                                                placeholder="Fax:"> </div>
                                        @if ($errors->has('facility_fax'))
                                            <span class="text-danger">{{ $errors->first('facility_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Website Address: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_website"
                                                value="{{ auth()->user()->company_website }}" type="text"
                                                class="form-control" placeholder="Website Address:"> </div>
                                        @if ($errors->has('facility_website'))
                                            <span class="text-danger">{{ $errors->first('facility_website') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Corporate Billing Contact: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input
                                                name="corporate_billing_ocntact"
                                                value="{{ auth()->user()->name }}" type="text"
                                                class="form-control" placeholder="Corporate Billing Contact:"> </div>
                                        @if ($errors->has('corporate_billing_ocntact'))
                                            <span
                                                class="text-danger">{{ $errors->first('corporate_billing_ocntact') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Billing Address: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="billing_address"
                                                value="{{ auth()->user()->company_address }}" type="text" class="form-control"
                                                placeholder="Billing Address:"> </div>
                                        @if ($errors->has('billing_address'))
                                            <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="billing_phone"
                                                value="{{ auth()->user()->phone }}" type="text" class="form-control"
                                                placeholder="Phone:"> </div>
                                        @if ($errors->has('billing_phone'))
                                            <span class="text-danger">{{ $errors->first('billing_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="billing_fax"
                                                value="{{ old('billing_fax') }}" type="text" class="form-control"
                                                placeholder="Fax:"> </div>
                                        @if ($errors->has('billing_fax'))
                                            <span class="text-danger">{{ $errors->first('billing_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="billing_email"
                                                value="{{ auth()->user()->email }}" type="text" class="form-control"
                                                placeholder="Email:"> </div>
                                        @if ($errors->has('billing_email'))
                                            <span class="text-danger">{{ $errors->first('billing_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Facility Billing Contact: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_billing_contact"
                                                value="{{ auth()->user()->name }}" type="text"
                                                class="form-control" placeholder="  Facility Billing Contact:"> </div>
                                        @if ($errors->has('facility_billing_contact'))
                                            <span
                                                class="text-danger">{{ $errors->first('facility_billing_contact') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Billing Address: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_billing_address"
                                                value="{{ auth()->user()->address }}" type="text"
                                                class="form-control" placeholder="Billing Address:"> </div>
                                        @if ($errors->has('facility_billing_address'))
                                            <span
                                                class="text-danger">{{ $errors->first('facility_billing_address') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_billing_phone"
                                                value="{{ auth()->user()->phone }}" type="text"
                                                class="form-control" placeholder="Phone:"> </div>
                                        @if ($errors->has('facility_billing_phone'))
                                            <span
                                                class="text-danger">{{ $errors->first('facility_billing_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_billing_fax"
                                                value="{{ old('facility_billing_fax') }}" type="text"
                                                class="form-control" placeholder="Fax:"> </div>
                                        @if ($errors->has('facility_billing_fax'))
                                            <span class="text-danger">{{ $errors->first('facility_billing_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_billing_email"
                                                value="{{ auth()->user()->email }}" type="text"
                                                class="form-control" placeholder="Email:"> </div>
                                        @if ($errors->has('facility_billing_email'))
                                            <span
                                                class="text-danger">{{ $errors->first('facility_billing_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Director of Nursing: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="director_nursing"
                                                value="{{ old('director_nursing') }}" type="text"
                                                class="form-control" placeholder="  Director of Nursing:"> </div>
                                        @if ($errors->has('director_nursing'))
                                            <span class="text-danger">{{ $errors->first('director_nursing') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nursing_phone"
                                                value="{{ old('nursing_phone') }}" type="text" class="form-control"
                                                placeholder="Phone:"> </div>
                                        @if ($errors->has('nursing_phone'))
                                            <span class="text-danger">{{ $errors->first('nursing_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nursing_fax"
                                                value="{{ old('nursing_fax') }}" type="text" class="form-control"
                                                placeholder="Fax:"> </div>
                                        @if ($errors->has('nursing_fax'))
                                            <span class="text-danger">{{ $errors->first('nursing_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nursing_email"
                                                value="{{ old('nursing_email') }}" type="text" class="form-control"
                                                placeholder="Email:"> </div>
                                        @if ($errors->has('nursing_email'))
                                            <span class="text-danger">{{ $errors->first('nursing_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Facility Administrator: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="facility_administrator"
                                                value="{{ old('facility_administrator') }}" type="text"
                                                class="form-control" placeholder="  Facility Administrator:"> </div>
                                        @if ($errors->has('facility_administrator'))
                                            <span
                                                class="text-danger">{{ $errors->first('facility_administrator') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="administrator_phone"
                                                value="{{ old('administrator_phone') }}" type="text"
                                                class="form-control" placeholder="Phone:"> </div>
                                        @if ($errors->has('administrator_phone'))
                                            <span class="text-danger">{{ $errors->first('administrator_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="administrator_fax"
                                                value="{{ old('administrator_fax') }}" type="text"
                                                class="form-control" placeholder="Fax:"> </div>
                                        @if ($errors->has('administrator_fax'))
                                            <span class="text-danger">{{ $errors->first('administrator_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="administrator_email"
                                                value="{{ old('administrator_email') }}" type="text"
                                                class="form-control" placeholder="Email:"> </div>
                                        @if ($errors->has('administrator_email'))
                                            <span class="text-danger">{{ $errors->first('administrator_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Staffing Coordinator: </label>
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="staffing_coordinator"
                                                value="{{ old('staffing_coordinator') }}" type="text"
                                                class="form-control" placeholder="  Facility Administrator:"> </div>
                                        @if ($errors->has('staffing_coordinator'))
                                            <span class="text-danger">{{ $errors->first('staffing_coordinator') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Phone: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="coordinator_phone"
                                                value="{{ old('coordinator_phone') }}" type="text"
                                                class="form-control" placeholder="Phone:"> </div>
                                        @if ($errors->has('coordinator_phone'))
                                            <span class="text-danger">{{ $errors->first('coordinator_phone') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Fax: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="coordinator_fax"
                                                value="{{ old('coordinator_fax') }}" type="text" class="form-control"
                                                placeholder="Fax:"> </div>
                                        @if ($errors->has('coordinator_fax'))
                                            <span class="text-danger">{{ $errors->first('coordinator_fax') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> Email: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="coordinator_email"
                                                value="{{ old('coordinator_email') }}" type="text"
                                                class="form-control" placeholder="Email:"> </div>
                                        @if ($errors->has('coordinator_email'))
                                            <span class="text-danger">{{ $errors->first('coordinator_email') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-12">
                                        <h6>Facility Type (check all that apply) :</h6>
                                    </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Retirement Home"> <label
                                            for="vehicle1"> Retirement Home</label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Assisted Living"> <label
                                            for="vehicle1"> Assisted Living </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Memory Care"> <label for="vehicle1">
                                            Memory Care</label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Nursing Home"> <label for="vehicle1">
                                            Nursing Home </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Hospital"> <label for="vehicle1">
                                            Hospital </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Psychiatric Facility"> <label
                                            for="vehicle1"> Psychiatric Facility </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Clinic"> <label for="vehicle1"> Clinic
                                        </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Adult Family Home"> <label
                                            for="vehicle1"> Adult Family Home </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Home Health"> <label for="vehicle1">
                                            Home Health </label><br> </div>
                                    <div class="form-group col-lg-6"> <input name="facility_type[]" type="checkbox"
                                            id="vehicle1" name="vehicle1" value="Other"> <label for="vehicle1">Other:
                                            _ </label><br> </div>
                                    @if ($errors->has('facility_type'))
                                        <span class="text-danger">{{ $errors->first('facility_type') }}</span>
                                        @endif <div class="form-group col-lg-4">
                                            <!-- Label --> <label class="pb-1"> Nurse Ratio Per Floor: </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge"> <input
                                                    name="nurse_ratio_per_floor"
                                                    value="{{ old('nurse_ratio_per_floor') }}" type="text"
                                                    class="form-control" placeholder="Nurse Ratio Per Floor: "> </div>
                                            @if ($errors->has('nurse_ratio_per_floor'))
                                                <span
                                                    class="text-danger">{{ $errors->first('nurse_ratio_per_floor') }}</span>
                                                @endif
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <!-- Label --> <label class="pb-1"> Aide Ratio Per Floor: </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge"> <input name="aide_ratio_per_floor"
                                                    value="{{ old('aide_ratio_per_floor') }}" type="text"
                                                    class="form-control" placeholder="Aide Ratio Per Floor: "> </div>
                                            @if ($errors->has('aide_ratio_per_floor'))
                                                <span
                                                    class="text-danger">{{ $errors->first('aide_ratio_per_floor') }}</span>
                                                @endif
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <!-- Label --> <label class="pb-1"> Patient Ratio per Floor: </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge"> <input
                                                    name="patient_ratio_per_floor"
                                                    value="{{ old('patient_ratio_per_floor') }}" type="text"
                                                    class="form-control" placeholder="Patient Ratio per Floor:"> </div>
                                            @if ($errors->has('patient_ratio_per_floor'))
                                                <span
                                                    class="text-danger">{{ $errors->first('patient_ratio_per_floor') }}</span>
                                                @endif
                                        </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-12">
                                        <h6>Shift Start & Stop Hours:</h6>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <h6>NAC/HHA/MAC</h6>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <h6>RN/LPN/MT</h6>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 1st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nac_first_shift"
                                                value="{{ old('nac_first_shift') }}" type="text" class="form-control"
                                                placeholder="1st Shift: "> </div>
                                        @if ($errors->has('nac_first_shift'))
                                            <span class="text-danger">{{ $errors->first('nac_first_shift') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 1st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="rn_first_shift"
                                                value="{{ old('rn_first_shift') }}" type="text" class="form-control"
                                                placeholder=" 1st Shift:  "> </div>
                                        @if ($errors->has('rn_first_shift'))
                                            <span class="text-danger">{{ $errors->first('rn_first_shift') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 2st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nac_second_shift"
                                                value="{{ old('nac_second_shift') }}" type="text"
                                                class="form-control" placeholder="2st Shift: "> </div>
                                        @if ($errors->has('nac_second_shift'))
                                            <span class="text-danger">{{ $errors->first('nac_second_shift') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 2st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="rn_second_shift"
                                                value="{{ old('rn_second_shift') }}" type="text" class="form-control"
                                                placeholder=" 2st Shift:  "> </div>
                                        @if ($errors->has('rn_second_shift'))
                                            <span class="text-danger">{{ $errors->first('rn_second_shift') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 3st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="nac_third_shift"
                                                value="{{ old('nac_third_shift') }}" type="text" class="form-control"
                                                placeholder="3st Shift: "> </div>
                                        @if ($errors->has('nac_third_shift'))
                                            <span class="text-danger">{{ $errors->first('nac_third_shift') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Label --> <label class="pb-1"> 3st Shift: </label> <!-- Input group -->
                                        <div class="input-group input-group-merge"> <input name="rn_third_shift"
                                                value="{{ old('rn_third_shift') }}" type="text" class="form-control"
                                                placeholder=" 3st Shift:  "> </div>
                                        @if ($errors->has('rn_third_shift'))
                                            <span class="text-danger">{{ $errors->first('rn_third_shift') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-12">
                                        <h6>12 Hour Shift Start & Stop Times: </h6>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <label class="pb-1"> Medical
                                                Treatment Shift: </label> </div>
                                    </div>
                                    <div class="form-group col-lg-6"> <input name="medical_treatement_shift"
                                            value="{{ old('medical_treatement_shift') }}" type="text"
                                            class="form-control" placeholder=" "> </div>
                                    @if ($errors->has('medical_treatement_shift'))
                                        <span class="text-danger">{{ $errors->first('medical_treatement_shift') }}</span>
                                        @endif <div class="form-group col-lg-6">
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge"> <label class="pb-1"> Assisted
                                                    Living Shift: </label> </div>
                                        </div>
                                        <div class="form-group col-lg-6"> <input name="assisted_living_shift"
                                                value="{{ old('assisted_living_shift') }}" type="text"
                                                class="form-control" placeholder=" "> </div>
                                        @if ($errors->has('assisted_living_shift'))
                                            <span class="text-danger">{{ $errors->first('assisted_living_shift') }}</span>
                                            @endif <div class="form-group col-lg-6">
                                                <!-- Input group -->
                                                <div class="input-group input-group-merge"> <label class="pb-1"> Charge
                                                        Position Shift: </label> </div>
                                            </div>
                                            <div class="form-group col-lg-6"> <input name="charge_position_shift"
                                                    value="{{ old('charge_position_shift') }}" type="text"
                                                    class="form-control" placeholder=" "> </div>
                                            @if ($errors->has('charge_position_shift'))
                                                <span
                                                    class="text-danger">{{ $errors->first('charge_position_shift') }}</span>
                                                @endif <div class="form-group col-lg-12">
                                                    <!-- Label --> <label class="pb-1"> Comments or Additional
                                                        information that DSA should now: </label> <!-- Input group -->
                                                    <div class="input-group input-group-merge">
                                                        <textarea name="comment_additional_info" type="" class="form-control" placeholder=" ">{{ old('comment_additional_info') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('comment_additional_info'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('comment_additional_info') }}</span>
                                                        @endif
                                                </div>
                                </div>
                                <hr>
                                <div class="row text-left pb-50">
                                    <div class="form-group col-lg-12">
                                        <h6>Disclosure Questionnaire:</h6>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <!-- Input group -->
                                        <div class="input-group input-group-merge"> <label class="pb-1"> 1. Has the
                                                Company/Ownership field for bankruptcy within the past 7 years ? </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3"> <label for="html">Yes</label> <input
                                            name="is_bankruptcy" type="radio" id="yes" name="fav_language"
                                            value="YES"> </div>
                                    <div class="form-group col-lg-3"> <label for="html">No</label> <input
                                            name="is_bankruptcy" type="radio" id="no" name="fav_language"
                                            value="NO"> </div>
                                    @if ($errors->has('is_bankruptcy'))
                                        <span class="text-danger">{{ $errors->first('is_bankruptcy') }}</span>
                                        @endif <div class="form-group col-lg-6">
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge"> <label class="pb-1"> 2. Has
                                                    there been any corporate/ownership change within the past year? </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3"> <label for="html">Yes</label> <input
                                                name="is_corporate_change" type="radio" id="yes1"
                                                name="fav_language1" value="YES"> </div>
                                        <div class="form-group col-lg-3"> <label for="html">No</label> <input
                                                name="is_corporate_change" type="radio" id="no1"
                                                name="fav_language1" value="NO"> </div>
                                        @if ($errors->has('is_corporate_change'))
                                            <span class="text-danger">{{ $errors->first('is_corporate_change') }}</span>
                                            @endif <div class="form-group col-lg-6">
                                                <!-- Input group -->
                                                <div class="input-group input-group-merge"> <label class="pb-1"> 3. Is
                                                        Company planning any change in ownership within the next year?
                                                    </label> </div>
                                            </div>
                                            <div class="form-group col-lg-3"> <label for="html">Yes</label> <input
                                                    name="is_owner_change" type="radio" id="yes2"
                                                    name="fav_language2" value="YES"> </div>
                                            <div class="form-group col-lg-3"> <label for="html">No</label> <input
                                                    name="is_owner_change" type="radio" id="no2"
                                                    name="fav_language2" value="NO"> </div>
                                            @if ($errors->has('is_owner_change'))
                                                <span class="text-danger">{{ $errors->first('is_owner_change') }}</span>
                                                @endif <div class="form-group col-lg-6">
                                                    <!-- Input group -->
                                                    <div class="input-group input-group-merge"> <label class="pb-1"> 4.
                                                            Does the Facility do any Fit Testing? </label> </div>
                                                </div>
                                                <div class="form-group col-lg-3"> <label for="html">Yes</label> <input
                                                        name="is_fit_testing" type="radio" id="yes3"
                                                        name="fav_language3" value="YES"> </div>
                                                <div class="form-group col-lg-3"> <label for="html">No</label> <input
                                                        name="is_fit_testing" type="radio" id="no3"
                                                        name="fav_language3" value="NO"> </div>
                                                @if ($errors->has('is_fit_testing'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('is_fit_testing') }}</span>
                                                    @endif <div class="form-group col-lg-12">
                                                        <!-- Label --> <label class="pb-1"> If you have answered Yes to
                                                            any of the questions above, please provide an explanation below:
                                                        </label> <!-- Input group -->
                                                        <div class="input-group input-group-merge">
                                                            <textarea name="disclosure_comment" type="" class="form-control" placeholder=" ">{{ old('disclosure_comment') }}</textarea>
                                                        </div>
                                                        @if ($errors->has('disclosure_comment'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('disclosure_comment') }}</span>
                                                            @endif
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <!-- Input group -->
                                                        <div class="input-group input-group-merge"> <label class="pb-1">
                                                                5. What type of PPE mask does the Facility Use? </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6"> <input name="ppe_mask_type"
                                                            value="{{ old('ppe_mask_type') }}" type="text"
                                                            class="form-control" placeholder=" "> </div>
                                                    @if ($errors->has('ppe_mask_type'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('ppe_mask_type') }}</span>
                                                        @endif <div class="form-group col-lg-6">
                                                            <!-- Input group -->
                                                            <div class="input-group input-group-merge"> <label
                                                                    class="pb-1"> 6. Number of years the Facility has
                                                                    been in operation? </label> </div>
                                                        </div>
                                                        <div class="form-group col-lg-6"> <input
                                                                name="facility_operation_year"
                                                                value="{{ old('facility_operation_year') }}"
                                                                type="text" class="form-control" placeholder=" ">
                                                        </div>
                                                        @if ($errors->has('facility_operation_year'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('facility_operation_year') }}</span>
                                                            @endif <div class="form-group col-lg-6">
                                                                <!-- Input group -->
                                                                <div class="input-group input-group-merge"> <label
                                                                        class="pb-1"> 7. How did the Company hear about
                                                                        Dependable Staffing Agency, LTD? </label> </div>
                                                            </div>
                                                            <div class="form-group col-lg-6"> <input name="how_you_hear"
                                                                    value="{{ old('how_you_hear') }}" type="text"
                                                                    class="form-control" placeholder=" "> </div>
                                                            @if ($errors->has('how_you_hear'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('how_you_hear') }}</span>
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
