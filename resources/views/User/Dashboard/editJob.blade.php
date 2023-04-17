

@extends('User.Dashboard.main')
@section('contentt')
<section class="resume">
   <div class="container">
      <div class="page-heading">
         <h2>Edit The job</h2>
      </div>
      <div class="panel-body">
         <div class="panel-heading">Job Details</div>
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
               <label>Type</label>
               <select name="type" id="" class="form-control">
                 {{-- {{  }} --}}
                  <option <?php $job->type == 'Full Time/Part Time' ? 'selected' : '' ?> value="Full Time/Part Time">Full Time/Part Time</option>
                  <option <?php $job->type == 'Full Time' ? 'selected' : '' ?> value="Full Time">Full Time</option>
                  <option <?php $job->type == 'Part Time' ? 'selected' : '' ?> value="Part Time">Part Time</option>
               </select>
               @if ($errors->has('type'))
               <span class="text-danger">{{ "type is required field" }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Industry Type</label>
               <select name="department_id" id="" class="form-control">
                  <option value="{{ $s_departments->id }}">{{ $s_departments->name }}</option>
                  @foreach ($departments as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
               </select>
               @if ($errors->has('department_id'))
               <span class="text-danger">{{ "department is required field" }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label> Position Name</label>
               <input type="text" class="form-control" name="position" value="{{ $job->position }}" />
               @if ($errors->has('position'))
               <span class="text-danger">{{ $errors->first('position') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Skills Needed</label>
               <input type="text" class="form-control" name="skills_required" value="{{ $job->skills_required }}" />
               @if ($errors->has('skills_required'))
               <span class="text-danger">{{ $errors->first('skills_required') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Experience</label>
               <input type="text" class="form-control" name="experience" value="{{ $job->experience }}" />
               @if ($errors->has('experience'))
               <span class="text-danger">{{ $errors->first('experience') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Number Of Openings</label>
               <input type="text" class="form-control" name="number_of_post" value="{{ $job->number_of_post }}" />
               @if ($errors->has('number_of_post'))
               <span class="text-danger">{{ $errors->first('number_of_post') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Location <span>(Optional)</span></label>
               <input type="text" class="form-control" name="location"  value="{{ $job->location }}" />
               @if ($errors->has('location'))
               <span class="text-danger">{{ $errors->first('location') }}</span>
               @endif
            </div>
            <hr>
            <div class="form-group col-md-12 p-r">
               <label>Description</label>
               <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description"
                  >{{ $job->description }}</textarea>
               @if ($errors->has('description'))
               <span class="text-danger">{{ $errors->first('description') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Compensation</label>
               <input type="text" class="form-control" name="compensation" value="{{ $job->compensation }}" />
               @if ($errors->has('compensation'))
               <span class="text-danger">{{ $errors->first('compensation') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Cover Image</label>
               <input type="file" class="form-control choose-file" name="cover_image" value="{{ $job->cover_image }}">
               @if ($errors->has('cover_image'))
               <span class="text-danger">{{ $errors->first('cover_image') }}</span>
               @endif
            </div>
            <div class="form-group col-md-6 p-r">
               <label>Application End date</label>
               <input type="date" class="form-control choose-file" name="application_last_date" value="{{ $job->application_last_date}}">
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
               <button type="submit" class="btn btn-sm read_more mrgn-30-top">Update Job</button>
            </div>
         </div>
        </form>
      </div>
   </div>
   </div>
</section>
@endsection