@extends('Admin.Main.masterLayout')
@section('title', 'Edit-CMS | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-3"></div>
       <div class="col-lg-6">
           <div class="card">
               <div class="card-title">
                   <h4>Edit CMS</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('cms.update', $cms->slug) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="title" value="{{ $cms->title }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Enter Short Desc....." name="short_desc" value="{{ $cms->short_desc }}">
                                @if ($errors->has('short_desc'))
                                    <span class="text-danger">{{ $errors->first('short_desc') }}</span>
                                @endif
                                </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description">{{ $cms->description }}</textarea>
                               
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Current Image</label>
                                @if (isset($cms->image) && !empty($cms->image) && File::exists(public_path("storage/CmsImage/" . $cms->image)))
                                <img height="80" width="100" src="{{ asset('storage/CmsImage/'.$cms->image)}}" alt="">
                                @else
                                <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> 
                                @endif    
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control"name="image" value="{{ $cms->image }}">
                               
                            </div>
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Update</button>
                           <button onclick="{{ route('cms.index') }}" class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

  
@endsection
@include('Admin.sweetAlertMsg')  