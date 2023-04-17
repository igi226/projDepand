@extends('Admin.Main.masterLayout')
@section('title', 'Add-Members | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-3"></div>
       <div class="col-lg-6">
           <div class="card">
               <div class="card-title">
                   <h4>Add New Member</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('members.store') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control"name="image" value="{{ old('image') }}">
                               
                            </div>
                            <div class="form-group">
                                <label>Facebook Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="facebook">
                            </div>
                            <div class="form-group">
                                <label>Twitter Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="twitter">
                            </div>
                            <div class="form-group">
                                <label>Github Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="github">
                            </div>
                            <div class="form-group">
                                <label>Dribbble Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="dribbble">
                            </div>
                            
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Create</button>
                           <button onclick="{{ route('members.index') }}" class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

  
@endsection
@include('Admin.sweetAlertMsg')  