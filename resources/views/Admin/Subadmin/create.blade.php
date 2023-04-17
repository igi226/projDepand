@extends('Admin.Main.masterLayout')

@section('title', 'Add-Subadmin | Defendable Stuffing Agency')

@section('content')

    <div class="">

        <div class="row justify-content-center">


            <div class="col-lg-8">

                <div class="card">

                    <div class="card-title">

                        <h4>Add-Subadmin</h4>



                    </div>

                    <div class="card-body">

                        <div class="basic-form">

                            <form action="{{ route('sub-admins.store') }}" method="post">

                                @csrf

                                <div class="form-group">

                                    <label>Name</label>

                                    <input type="text" class="form-control" placeholder="Enter Name....."
                                        name="admin_name" value="{{ old('admin_name') }}">

                                    @if ($errors->has('admin_name'))
                                        <span class="text-danger">{{ $errors->first('admin_name') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Email</label>

                                    <input type="email" class="form-control" placeholder="Enter email....."
                                        name="admin_email" value="{{ old('admin_email') }}">

                                    @if ($errors->has('admin_email'))
                                        <span class="text-danger">{{ $errors->first('admin_email') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Password</label>

                                    <input type="password" class="form-control" placeholder="Enter Strong Password....."
                                        name="password">

                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>

                                {{-- <div class="form-group">

                                <label>Status</label>

                               <select name="status" class="form-control" id="">

                                    <option value="1"> Select Status </option>

                                    <option value="1">Active</option>

                                    <option value="0">Inactive</option>

                               </select>

                                @if ($errors->has('status'))

                                    <span class="text-danger">{{ $errors->first('status') }}</span>

                                @endif

                            </div> --}}

                                <h6 class="text-dark">Give Access</h6>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Employee" type="checkbox"> Employee
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Employer" type="checkbox"> Employer
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Team Member" type="checkbox"> Team
                                            Member </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Blog" type="checkbox"> Blog </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Cms" type="checkbox"> Cms </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Departments" type="checkbox">
                                            Departments </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Job" type="checkbox"> Job </label>
                                    </div>

                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Terms&Condition" type="checkbox">
                                            Terms&Condition </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Service Requested" type="checkbox">
                                            Service Requested </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Request Talent Form" type="checkbox">
                                            Request Talent Form </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Submit Resume Form" type="checkbox">
                                            Submit Resume Form </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Facility Intake Form"
                                                type="checkbox">Facility Intake Form </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Patient Referrals List"
                                                type="checkbox"> Patient Referrals List </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label><input name="subadmin_access[]" value="Site Settings" type="checkbox"> Site
                                            Settings </label>
                                    </div>
                                    @if ($errors->has('subadmin_access'))

                                    <span class="text-danger">{{ $errors->first('subadmin_access') }}</span>

                                @endif
                                </div>




                                <div class="text-center">

                                    <button type="submit" class="btn btn-default btn-sm">Create</button>

                                    <button onclick="{{ route('sub-admins.index') }}"
                                        class="btn btn-danger btn-sm">Cancel</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>





    @endsection

    @include('Admin.sweetAlertMsg')
