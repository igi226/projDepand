@extends('User.Dashboard.main')
@section('contentt')

 
      <div class="page-heading">
         <h2>Post / Create A Job</h2>
      </div>
      <div class="panel-body">
         <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">Job Details</div>
         <form action="{{ route('employer.storeJob') }}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="row">
            <div class="form-group col-md-6 ">
               <label>Job Title</label>
               <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
               @if ($errors->has('title'))
               <span class="text-danger">{{ $errors->first('title') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Type</label>
               <select name="type" id="" class="form-control">
                  <option value="">Select Type</option>
                  <option value="Full Time/Part Time">Full Time/Part Time</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Part Time">Part Time</option>
               </select>
               @if ($errors->has('type'))
               <span class="text-danger">{{ "type is required field" }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Department</label>
               <select name="department_id" id="" class="form-control">
                  <option value="">Select </option>
                  @foreach ($departments as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
               </select>
               @if ($errors->has('department_id'))
               <span class="text-danger">{{ "department is required field" }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label> Position Name</label>
               <input type="text" class="form-control" name="position" value="{{ old('position') }}" />
               @if ($errors->has('position'))
               <span class="text-danger">{{ $errors->first('position') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Skills Needed</label>
               <input type="text" class="form-control" name="skills_required" value="{{ old('skills_required') }}" />
               @if ($errors->has('skills_required'))
               <span class="text-danger">{{ $errors->first('skills_required') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Experience</label>
               <input type="text" class="form-control" name="experience" value="{{ old('experience') }}" />
               @if ($errors->has('experience'))
               <span class="text-danger">{{ $errors->first('experience') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Number Of Openings</label>
               <input type="text" class="form-control" name="number_of_post" value="{{ old('number_of_post') }}" />
               @if ($errors->has('number_of_post'))
               <span class="text-danger">{{ $errors->first('number_of_post') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Location <span>(Optional)</span></label>
               <input type="text" class="form-control" name="location"  value="{{ old('location') }}" />
               @if ($errors->has('location'))
               <span class="text-danger">{{ $errors->first('location') }}</span>
               @endif
            </div>
            <hr>
            <div class="form-group col-md-12 ">
               <label>Description</label>
               <textarea id="summernote" class="form-control d-none" placeholder="Enter description....." name="description"
                  value="{{ old('description') }}"></textarea>
               @if ($errors->has('description'))
               <span class="text-danger">{{ $errors->first('description') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Compensation</label>
               <input type="text" class="form-control" name="compensation" value="{{ old('compensation') }}" />
               @if ($errors->has('compensation'))
               <span class="text-danger">{{ $errors->first('compensation') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Cover Image</label>
               <input type="file" class="form-control choose-file" name="cover_image" value="{{ old('cover_image') }}">
               @if ($errors->has('cover_image'))
               <span class="text-danger">{{ $errors->first('cover_image') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Application End date</label>
               <input type="date" class="form-control choose-file" name="application_last_date" value="{{ old('application_last_date') }}">
               @if ($errors->has('application_last_date'))
               <span class="text-danger">{{ $errors->first('application_last_date') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 ">
               <label>Attach Job Description <span class="text-primary" style="font-size: 12px;">(.pdf/.docx/.doc)</span></label>
               <input type="file" class="form-control choose-file" name="job_doc" value="{{ old('job_doc') }}">
               @if ($errors->has('job_doc'))
               <span class="text-danger">{{ $errors->first('job_doc') }}</span>
               @endif
            </div>
            
            <div class="col-md-12 p-l text-center mt-5">
               <button type="submit" class="btn btn-sm read_more mrgn-30-top">Post Job</button>
            </div>
         </div>
        </form>
      </div>
   </div>


@endsection