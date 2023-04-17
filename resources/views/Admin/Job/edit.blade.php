@extends('Admin.Main.masterLayout')

@section('title', 'Edit-Job | Defendable Stuffing Agency')

@section('content')

    <div class="">

        <div class="row">

            <div class="col-lg-1"></div>

            <div class="col-lg-10">

                <div class="card">

                    <div class="card-title">

                        <h4>Edit Job</h4>



                    </div>

                    <div class="card-body">

                        <div class="basic-form">

                            <form action="{{ route('jobs.update', $jobs->slug) }}" method="post" enctype="multipart/form-data">

                                @csrf

                                @method('PUT')

                                <div class="form-group">
                                    <label>Employer name</label>
                                    <select name="employer_id" id="" class="form-control js-example-basic-single">
                                        <option value="{{ $jobs->employer_id }}">{{ $jobs->user->name }}- {{ $jobs->user->email }} </option>
                                        @foreach ($employers as $employer)
                                            <option value="{{ $employer->id }}">{{ $employer->name }}-{{ $employer->email }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('employer_id'))
                                        <span class="text-danger">{{ 'Employer Name is Required Field' }}</span>
                                    @endif
                                </div>

                                <div class="form-group">

                                    <label>Job Title</label>

                                    <input type="text" class="form-control" placeholder="Enter Name....." name="title"
                                        value="{{ $jobs->title }}">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Type</label>

                                    <select name="type" id="" class="form-control">

                                        <option value="Full Time/Part Time"
                                            @if ($jobs->type == 'Full Time/Part Time') selected @endif>Full Time/Part Time</option>



                                        <option value="Full Time" @if ($jobs->type == 'Full Time') selected @endif>Full
                                            Time</option>

                                        <option value="Part Time" @if ($jobs->type == 'Part Time') selected @endif>Part
                                            Time</option>





                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ 'Type is Required Field' }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Department</label>

                                    <select name="department_id" id="" class="form-control">

                                        <option value="{{ $jobs->department->id }}">{{ $jobs->department->name }}</option>

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
                                        name="position" value="{{ $jobs->position }}">

                                    @if ($errors->has('position'))
                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Skills Needed</label>

                                    <input type="text" class="form-control"
                                        placeholder="Enter Job Skills separated by comma(,)....." name="skills_required"
                                        value="{{ $jobs->skills_required }}">

                                    @if ($errors->has('skills_required'))
                                        <span class="text-danger">{{ $errors->first('skills_required') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Experience</label>

                                    <select name="experience" id="" class="form-control">



                                        <option value="Entry-level(0-3)" @if ($jobs->experience == 'Entry-level(0-3)') selected @endif>
                                            Entry-level(0-1)</option>

                                        <option value="Mid-level(4-10)" @if ($jobs->experience == 'Mid-level(4-10)') selected @endif>
                                            Mid-level(1.5-3)</option>

                                        <option value="Senior-level(10+)"
                                            @if ($jobs->experience == 'Senior-level(10+)') selected @endif>Senior-level(3+)</option>





                                    </select>

                                    @if ($errors->has('experience'))
                                        <span class="text-danger">{{ 'Experience is Required Field' }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Number Of Openings</label>

                                    <input type="text" class="form-control" placeholder="Enter number of openings"
                                        name="number_of_post" value="{{ $jobs->number_of_post }}">

                                    @if ($errors->has('number_of_post'))
                                        <span class="text-danger">{{ $errors->first('number_of_post') }}</span>
                                    @endif

                                </div>
                                {{--  --}}


                                <div class="form-group">

                                    <label>Location</label>

                                    <input type="text" class="form-control" placeholder="Enter Job Location....."
                                        name="location" value="{{ $jobs->location }}">

                                    @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Description</label>

                                    <textarea id="summernote" type="text" class="form-control" placeholder="Enter description....." name="description">{{ $jobs->description }}</textarea>



                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif



                                </div>

                                <div class="form-group">

                                    <label>Compensation</label>

                                    <input type="text" class="form-control" placeholder="Enter Compensation....."
                                        name="compensation" value="{{ $jobs->compensation }}">

                                    @if ($errors->has('compensation'))
                                        <span class="text-danger">{{ $errors->first('compensation') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">

                                    <label>Last Date of Application</label>

                                    <input type="date" class="form-control" name="application_last_date"
                                        value="{{ $jobs->application_last_date }}">

                                    @if ($errors->has('application_last_date'))
                                        <span class="text-danger">{{ $errors->first('application_last_date') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Cover Image</label>

                                    <input type="file" class="form-control" name="cover_image"
                                        value="{{ $jobs->cover_image }}">

                                    @if ($errors->has('cover_image'))
                                        <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">

                                    <label>Attach Job Description<span class="text-primary"
                                            style="font-size: 12px;">(.pdf/.docx/.doc)</span></label>

                                    <input type="file" class="form-control" name="job_doc"
                                        value="{{ $jobs->job_doc }}">

                                    @if ($errors->has('job_doc'))
                                        <span class="text-danger">{{ $errors->first('job_doc') }}</span>
                                    @endif

                                </div>





                                <div class="text-center">

                                    <button type="submit" class="btn btn-default btn-sm">Update</button>

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
