@extends('Admin.Main.masterLayout')
@section('title', 'Edit-member | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-3"></div>
       <div class="col-lg-6">
           <div class="card">
               <div class="card-title">
                   <h4>Edit Member</h4>
                   
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('members.update', $member->slug) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name....." name="name" value="{{ $member->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Current Image</label>
                                @if (isset($member->image) && !empty($member->image) && File::exists(public_path("storage/MemberImage/" . $member->image)))
                                <img height="80" width="100" src="{{ asset('storage/MemberImage/'.$member->image)}}" alt="">
                                @else
                                <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> 
                                @endif    
                            </div>
                            <div class="form-group">
                                <label>Upload New</label>
                                <input type="file" class="form-control" placeholder="Enter Strong Password....." name="image" value="{{ $member->image }}">
                                
                            </div>
                            <div class="form-group">
                                <label>Facebook Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="facebook" value="{{ $member->facebook }}">
                            </div>
                            <div class="form-group">
                                <label>Twitter Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="twitter" value="{{ $member->twitter }}">
                            </div>
                            <div class="form-group">
                                <label>Github Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="github" value="{{ $member->github }}">
                            </div>
                            <div class="form-group">
                                <label>Dribbble Url</label>
                                <input type="text" class="form-control" placeholder="Enter Url....." name="dribbble" value="{{ $member->dribbble }}">
                            </div>
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Update</button>
                           <a href="{{ route('members.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
@include('Admin.sweetAlertMsg')  
