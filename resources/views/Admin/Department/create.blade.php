@extends('Admin.Main.masterLayout')

@section('title', 'Add-Department | Defendable Stuffing Agency')

@section('content')

<div class="">

    <div class="row">

       <div class="col-lg-3"></div>

       <div class="col-lg-6">

           <div class="card">

               <div class="card-title">

                   <h4>Add New Departments</h4>

                   

               </div>

               <div class="card-body">

                   <div class="basic-form">

                       <form action="{{ route('departments.store') }}" method="post" enctype="multipart/form-data">

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

                            <label>Status</label>

                           <select name="status" id="" class="form-control">

                                <option value="1">Select Status</option>

                                <option value="1">Active</option>

                                <option value="0">InActive</option>

                           </select>

                        </div>

                            

   

                           

   

                           <div class="text-center">

                           <button type="submit" class="btn btn-default btn-sm">Create</button>

                           <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm">Cancel</a>

                        </div>

                       </form>

                   </div>

               </div>

           </div>

       </div>

   </div>



  

@endsection

@include('Admin.sweetAlertMsg')  