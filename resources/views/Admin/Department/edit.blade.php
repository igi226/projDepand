@extends('Admin.Main.masterLayout')

@section('title', 'Edit-Department | Defendable Stuffing Agency')

@section('content')

<div class="">

    <div class="row">

       <div class="col-lg-3"></div>

       <div class="col-lg-6">

           <div class="card">

               <div class="card-title">

                   <h4>Edit Departments</h4>

                   

               </div>

               <div class="card-body">

                   <div class="basic-form">

                       <form action="{{ route('departments.update', $department->slug) }}" method="POST" enctype="multipart/form-data">

                           @csrf

                           @method('PUT')

                           <div class="form-group">

                            <label>Name</label>

                            <input type="text" class="form-control" placeholder="Enter Name....." name="name" value="{{ $department->name }}">

                            @if ($errors->has('name'))

                                <span class="text-danger">{{ $errors->first('name') }}</span>

                            @endif

                            </div>

                            <div class="form-group">

                                <label>Current Image</label>

                                @if (isset($department->image) && !empty($department->image) && File::exists(public_path("storage/DepartmentImage/" . $department->image)))

                                <img height="80" width="100" src="{{ asset('storage/DepartmentImage/'.$department->image)}}" alt="">

                                @else

                                <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> 

                                @endif    

                            </div>

                            <div class="form-group">

                                <label>Image</label>

                                <input type="file" class="form-control"name="image" value="{{ $department->image }}">

                               

                            </div>

                            <div class="form-group">

                            <label>Status</label>

                           <select name="status" id="" class="form-control">

                            <option value="1"> Select Status </option>

                            <option value="1" @if($department->status == 1) selected @endif>Active</option>

                            <option value="0" @if($department->status == 0) selected @endif>Inactive</option>

                           </select>

                        </div>

                            

   

                           

   

                           <div class="text-center">

                           <button type="submit" class="btn btn-default btn-sm">Update</button>

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