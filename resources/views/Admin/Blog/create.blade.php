@extends('Admin.Main.masterLayout')
@section('title', 'Add-Blog | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-1"></div>
       <div class="col-lg-9">
           <div class="card">
               <div class="card-title">
                   <h4>Create A Blog</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description" value="{{ old('description') }}"></textarea>
                               
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                           
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Create</button>
                           <button onclick="{{ route('blogs.index') }}" class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

  
@endsection
@include('Admin.sweetAlertMsg')  