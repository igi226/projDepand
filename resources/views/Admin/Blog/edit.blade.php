@extends('Admin.Main.masterLayout')
@section('title', 'Edit-Blog | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
      
       <div class="col-lg-12">
           <div class="card">
               <div class="card-title">
                   <h4>Edit The Blog</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('blogs.update', $blog->slug) }}" method="post" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="title" value="{{ $blog->title }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description">{{ $blog->description }}</textarea>
                               
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Current Image</label>
                                @if (isset($blog->image) && !empty($blog->image) && File::exists(public_path("storage/BlogImage/" . $blog->image)))
                                    <img  src="{{ asset('storage/BlogImage/'.$blog->image)}}" alt="article" class="img-fluid">
                                @else
                                    <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image" class="img-fluid">
                                @endif  
                                
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" value="{{ $blog->image }}">
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