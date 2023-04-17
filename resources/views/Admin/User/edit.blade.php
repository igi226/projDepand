@extends('Admin.Main.masterLayout')
@section('title', 'Edit-Users | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-3"></div>
       <div class="col-lg-6">
           <div class="card">
               <div class="card-title">
                   <h4>Edit User</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('users.update', $user->slug) }}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="name" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter email....." name="email" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Enter Strong Password....." name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                               <select name="status" class="form-control" id="">
                                    <option value="1"> Select Status </option>
                                    <option value="1" @if($user->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($user->status == 0) selected @endif>Inactive</option>
                               </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Update</button>
                           <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@include('Admin.sweetAlertMsg')  
