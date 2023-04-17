@extends('User.Dashboard.main')

@section('contentt')
    <section class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="">
                                <div class="d-lg-flex justify-content-between align-items-center">
                                    <span class="section-title text-primary mb-3 mb-sm-4 h2">About This Job</span>
                                    <div class="boxjobImg">
                                        
                                        @if (isset($job->cover_image) && !empty($job->cover_image) && File::exists(public_path('storage/JobImage/' . $job->cover_image)))
                                            <img src="{{ asset('storage/JobImage/'.$job->cover_image ) }}">
                                        @else
                                            <img src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                
                                {{--  --}}
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Job Title</div>
                                        <div class="col-6 text-end">{{ $job->title }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Position</div>
                                        <div class="col-6 text-end">{{ $job->position }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>
                                {{--  --}}


                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Detailed job description</div>
                                        <div class="col-6 text-end">
                                            @if (!empty($job->job_doc) && isset($job->job_doc) && File::exists(public_path('storage/JobDoc/' . $job->job_doc)))
                                            <a href="{{ asset('storage/JobDoc/'.$job->job_doc) }}" class="text-primary"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                                    class="fa fa-download font-size-18"></i></a>
                                            @else
                                            Description not uploded
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Experience</div>
                                        <div class="col-6 text-end">{{ $job->experience }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Skills</div>
                                        <div class="col-6 text-end">{{ $job->skills }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Type</div>
                                        <div class="col-6 text-end">{{ $job->type }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Total Openings</div>
                                        <div class="col-6 text-end">{{ $job->number_of_post }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                    </div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Industry Type</div>
                                        <div class="col-6 text-end">{{ $job->department->name }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%"
                                        aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar">
                                    </div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Compensation</div>
                                        <div class="col-6 text-end">{{ $job->compensation }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Posted Date</div>
                                        <div class="col-6 text-end">
                                            {{ Carbon\Carbon::parse($job->created_at)->format('D, d M Y H:i') }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Last Date of Apply</div>
                                        <div class="col-6 text-end">
                                            {{ Carbon\Carbon::parse($job->application_last_date)->format('D, d M Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                            </div>
                            <div>
                                <span class="section-title text-primary">Job Summary</span>
                                <p> <?php echo html_entity_decode($job->description); ?></p>

                            </div>
                            <div class="text-center" id="applyform">

                                @if (auth()->user()->user_type == 'Employer')
                                    <a class="btn btn-danger btn-sm " href="{{ route('employer.postedJobs') }}">Back</a>
                                @else
                                    {{-- <iframe width="100%" src="{{ asset('storage/Resume/'. auth()->user()->resume) }}"></iframe> --}}
                                    <form action="{{ route('employee.applyJob') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6 p-r float-left text-left">
                                                @php
                                                    $resume = DB::table('users')
                                                        ->where('id', auth()->id())
                                                        ->select('resume')
                                                        ->first();
                                                @endphp
                                                @if ($resume->resume)
                                                    <label><a
                                                            href="{{ asset('storage/Resume/' . auth()->user()->resume) }}"
                                                            target="_blank" rel="noopener noreferrer" class="btn btn-info text-white btn-sm">
                                                            <i class="fa fa-eye"></i> Preview Own
                                                            Resume</a></label><br>
                                                @else
                                                    @if ($errors->has('resume'))
                                                        <span class="text-danger">{{ $errors->first('resume') }}</span>
                                                    @endif
                                                    <input type="file" name="resume" />
                                                @endif


                                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="receiver_id"
                                                    value="{{ $job->employer_id }}">
                                                <input type="hidden" name="resumeold"
                                                    value="{{ auth()->user()->resume }}" />



                                            </div>
                                        </div>
                                        {{-- <button class="btn btn-primary btn-sm">Apply</button> --}}
                                        @php
                                            $is_already = DB::table('job_applications')
                                                ->where('job_id', $job->id)
                                                ->where('user_id', auth()->id())
                                                ->first();
                                            
                                        @endphp
                                        @if ($is_already)
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('employee.myApplication') }}">Already Applied</a>
                                        @else
                                            <button class="btn btn-primary btn-sm">Apply</button>
                                        @endif

                                    </form>


                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                {{--  --}}

                <div class="col-lg-12 mb-4 mb-sm-5 mt-4">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="">
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <h2 class="section-title text-primary mb-3 mb-sm-4 text-center">About This Company</h2>
                                    <div class="boxjobImg">
                                        @if (isset($job->user->company_image) && !empty($job->user->company_image) && File::exists(public_path('storage/Company_image/' . $job->user->company_image)))
                                            <img src="{{ asset('storage/Company_image/'.$job->user->company_image ) }}">
                                        @else
                                            <img src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Company Name</div>
                                        <div class="col-6 text-end">{{ $job->user->company_name }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Company Profile</div>
                                        <div class="col-6 text-end">
                                            @if (isset($job->user->resume) && !empty($job->user->resume) && File::exists(public_path('storage/Resume/' . $job->user->resume)))
                                                <a href="{{ asset('storage/Resume/' . $job->user->resume) }}" target="_blank" rel="noopener noreferrer">View Profile</a>
                                            @else
                                                No profile uploaded
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                                {{--  --}}


                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Company Description</div>
                                        <div class="col-6 text-end"><?php echo html_entity_decode($job->user->biography); ?></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Year of establishment</div>
                                        <div class="col-6 text-end">{{ $job->user->experience }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Company Website</div>
                                        <div class="col-6 text-end"><a href="{{ $job->user->company_website }}" target="_blank" rel="noopener noreferrer">Visit</a></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Total # of Employees</div>
                                        <div class="col-6 text-end">{{ $job->user->company_employee_strength }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Company Address</div>
                                        <div class="col-6 text-end">{{ $job->user->company_address }}</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar">
                                    </div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Video</div>
                                        <div class="col-6 text-end">@if (isset($job->user->video) && !empty($job->user->video) && File::exists(public_path('storage/Video/' . $job->user->video)))
                                            <a href="{{ asset('storage/Video/' . $job->user->video) }}" target="_blank" rel="noopener noreferrer">View</a>
                                        @else
                                            No profile uploaded
                                        @endif</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar">
                                    </div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Facebook</div>
                                        <div class="col-6 text-end"><a href="{{ $job->user->facebook}}" target="_blank" rel="noopener noreferrer">Visit</a></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Twitter</div>
                                        <div class="col-6 text-end"><a href="{{ $job->user->twitter}}" target="_blank" rel="noopener noreferrer">Visit</a></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Github</div>
                                        <div class="col-6 text-end"><a href="{{ $job->user->github}}" target="_blank" rel="noopener noreferrer">Visit</a></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6">Linkdin</div>
                                        <div class="col-6 text-end"><a href="{{ $job->user->linkdin}}" target="_blank" rel="noopener noreferrer">Visit</a></div>
                                    </div>
                                </div>
                                <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                    <div class="animated custom-bar progress-bar slideInLeft bg-secondary"
                                        style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                        role="progressbar"></div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    @if (isset($job->cover_image) &&
                                            !empty($job->cover_image) &&
                                            File::exists(public_path('storage/JobImage/' . $job->cover_image)))
                                        <td><img class="rounded" height="300" width="300"
                                                src="{{ asset('storage/JobImage/' . $job->cover_image) }}"
                                                alt="">
                                        </td>
                                    @else
                                        <td><img src="{{ asset('noimg.png') }}" alt="no-p_cover_image"> </td>
                                    @endif
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded"> --}}
                                        {{-- <h3 class="h2 text-white mb-0">{{ $job->title }}</h3> --}}
                                        {{-- <span class="text-primary">{{ $job->user->company_name }}</span>
                                    </div>
                                    <ul class="list-unstyled mb-1-9"> --}}
                                        {{-- <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Position:</span>
                                            {{ $job->position }}</li> --}}
                                        {{-- <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Hr
                                                Email:</span>{{ $job->user->email }} </li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Company
                                                Website:</span><a href="{{ $job->user->company_website }}"
                                                target="_blank" rel="noopener noreferrer"></a>
                                            {{ $job->user->company_website }} </li>
                                        <li class="display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Hr Phone:</span>
                                            {{ $job->user->phone }}</li>
                                    </ul>
                                    <div id="apply">
                                        @if (auth()->user()->user_type == 'Employee')
                                            @if ($is_already) --}}
                                                {{-- <a class="btn btn-primary btn-sm">Already Applied</a> --}}
                                                {{-- <a class="btn btn-primary btn-sm"
                                                    href="{{ route('employee.myApplication') }}">Already Applied</a>
                                            @endif

                                            @if (DB::table('favorite_jobs')->where('user_id', auth()->user()->id)->where('job_id', $job->id)->first())
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="addToFavorite({{ $job->id }}, {{ auth()->user()->id }})">Already
                                                    Added to Favourite</button>
                                            @else
                                                <button for="id-of-input" class="btn btn-primary btn-sm"
                                                    onclick="addToFavorite({{ $job->id }}, {{ auth()->user()->id }})">
                                                    Add to Favourite --}}
                                                    {{-- <span>
                                        <input type="checkbox" id="id-of-input"/>
                                        <i class="glyphicon glyphicon-star-empty"></i>
                                        <i class="glyphicon glyphicon-star"></i>
                                    </span> --}}

                                                {{-- </button>
                                            @endif
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12 text-center">
                    <a class="btn btn-danger btn-sm px-4" href="{{ route('employee.allJobs') }}">Back</a>
                </div>



            </div>
        </div>
    </section>
@endsection
@include('Admin.sweetAlertMsg')
@section('addToFavorite')
    <script>
        function addToFavorite(job_id, user_id) {
            // alert("job id is = " + job_id);
            // alert("user id is = " + user_id);
            function ajaxCall() {
                $.ajax({

                    url: '{{ route('employee.addToFavorite') }}',
                    type: "POST",
                    data: {
                        'job_id': job_id,
                        'user_id': user_id,

                        '_token': '{{ csrf_token() }}'

                    },

                    dataType: "JSON",
                    success: function(data) {
                        // var x = JSON.stringify(data);

                        console.log(data);
                        swal(data.msg);
                        $("#apply").load(window.location.href + " #apply");

                    },
                    error: function(error) {
                        console.log(`Error ${error}`);
                    }
                });
            }
            ajaxCall();
        }
    </script>
@endsection
