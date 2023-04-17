

@extends('User.Dashboard.main')
@section('contentt')
<section class="resume">
   <div class="container">
      <div class="page-heading">
         <h2>Apply for the Position</h2>
      </div>
      <div class="panel-body">
         
         <hr>
         <form action="{{ route('employer.updateJob', $job->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="row">
            <div class="form-group col-md-6 p-r">
               <label>Job Title</label>
               <input type="text" class="form-control" name="title" value="{{ $job->title }}" />
               @if ($errors->has('title'))
               <span class="text-danger">{{ $errors->first('title') }}</span>
               @endif
            </div>
            
            <div class="form-group col-md-6 p-r">
               <label>Compensation</label>
               <input type="text" class="form-control" name="compensation" value="{{ $job->compensation }}" />
               @if ($errors->has('compensation'))
               <span class="text-danger">{{ $errors->first('compensation') }}</span>
               @endif
            </div>
           
            <div class="col-md-12 p-l text-center mt-5">
               <button type="submit" class="btn btn-sm read_more mrgn-30-top">Update Job</button>
            </div>
         </div>
        </form>
      </div>
   </div>
   </div>
</section>
@endsection