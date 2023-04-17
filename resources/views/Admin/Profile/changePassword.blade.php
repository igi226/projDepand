@extends('Admin.Main.masterLayout')
@section('title', 'Site Info | Defendable Stuffing Agency')
@section('content')
<div class="">
 <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Change Password</h4>
                
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ url('admin/change-password') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Type Current Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="current_password">
                            @if ($errors->has('current_password'))
                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Enter New Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="new_password">
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="confirm_password">
                            @if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>

                        
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @include('Admin.sweetAlertMsg')