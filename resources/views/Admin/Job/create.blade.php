@extends('Admin.Main.masterLayout')

@section('title', 'Add-Job | Defendable Stuffing Agency')

@section('content')

    <div class="">

        <div class="row">

            <div class="col-lg-1"></div>

            <div class="col-lg-10">

                <div class="card">

                    <div class="card-title">

                        <h4>Add New Job</h4>



                    </div>

                    <div class="card-body">

                        <div class="basic-form">

                            <form action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">

                                    <label>Employer name</label>

                                    <select name="employer_id" id="" class="form-control js-example-basic-single">

                                        <option value="">Select </option>

                                        @foreach ($employers as $employer)
                                            <option value="{{ $employer->id }}">{{ $employer->name }}-{{ $employer->email }}</option>
                                        @endforeach



                                    </select>

                                    @if ($errors->has('employer_id'))
                                        <span class="text-danger">{{ 'Employer Name is Required Field' }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Title</label>

                                    <input type="text" class="form-control" placeholder="Enter Name....." name="title"
                                        value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Type</label>

                                    <select name="type" id="" class="form-control">

                                        <option value="">Select Type</option>

                                        <option value="Full Time/Part Time">Full Time/Part Time</option>

                                        <option value="Full Time">Full Time</option>

                                        <option value="Part Time">Part Time</option>





                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ 'Type is Required Field' }}</span>
                                    @endif

                                </div>
                                <div class="form-group">

                                    <label>Department</label>

                                    <select name="department_id" id="" class="form-control">

                                        <option value="">Select Department</option>

                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach



                                    </select>

                                    @if ($errors->has('department_id'))
                                        <span class="text-danger">{{ 'Department Name is Required Field' }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Position Name</label>

                                    <input type="text" class="form-control" placeholder="Enter position name"
                                        name="position" value="{{ old('position') }}">

                                    @if ($errors->has('position'))
                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Skills Needed</label>

                                    <input type="text" class="form-control"
                                        placeholder="Enter Job Skills separated by comma(,)....." name="skills_required"
                                        value="{{ old('skills_required') }}">

                                    @if ($errors->has('skills_required'))
                                        <span class="text-danger">{{ $errors->first('skills_required') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">

                                    <label>Experience</label>

                                    <select name="experience" id="" class="form-control">

                                        <option value="">Select Experience</option>

                                        <option value="Entry-level(0-3)">Entry-level(0-3)</option>

                                        <option value="Mid-level(4-10)">Mid-level(4-10)</option>

                                        <option value="Senior-level(10+)">Senior-level(10+)</option>






                                    </select>

                                    @if ($errors->has('experience'))
                                        <span class="text-danger">{{ 'Experience is Required Field' }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Number Of Openings</label>

                                    <input type="text" class="form-control" placeholder="Enter number of openings"
                                        name="number_of_post" value="{{ old('number_of_post') }}">

                                    @if ($errors->has('number_of_post'))
                                        <span class="text-danger">{{ $errors->first('number_of_post') }}</span>
                                    @endif

                                </div>
                                {{--  --}}







                                <div class="form-group">

                                    <label>Location</label>

                                    <input type="text" class="form-control" placeholder="Enter Job Location....."
                                        name="location" value="{{ old('location') }}">

                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Description</label>

                                    <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description"
                                        value="{{ old('description') }}"></textarea>



                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif



                                </div>






                                {{--  --}}







                                <div class="form-group">

                                    <label>Compensation</label>

                                    <input type="text" class="form-control" placeholder="Enter Compensation....."
                                        name="compensation" value="{{ old('compensation') }}">

                                    @if ($errors->has('compensation'))
                                        <span class="text-danger">{{ $errors->first('compensation') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Last Date of Application</label>

                                    <input type="date" class="form-control" name="application_last_date"
                                        value="{{ old('application_last_date') }}">

                                    @if ($errors->has('application_last_date'))
                                        <span class="text-danger">{{ $errors->first('application_last_date') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">

                                    <label>Cover Image</label>
                                    <input type="file" class="form-control choose-file" name="cover_image"
                                        value="{{ old('cover_image') }}">
                                    @if ($errors->has('cover_image'))
                                        <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">

                                    <label>Attach Job Description<span class="text-primary"
                                            style="font-size: 12px;">(.pdf/.docx/.doc)</span></label>

                                    <input type="file" class="form-control" name="job_doc">

                                    @if ($errors->has('job_doc'))
                                        <span class="text-danger">{{ $errors->first('job_doc') }}</span>
                                    @endif

                                </div>



                                <div class="text-center">

                                    <button type="submit" class="btn btn-default btn-sm">Create</button>

                                    <a href="{{ route('jobs.index') }}" class="btn btn-danger btn-sm">Cancel</a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>





    @endsection

    @include('Admin.sweetAlertMsg')
