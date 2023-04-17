@extends('User.Dashboard.main')
@section('contentt')
    <div class="panel-body">
        <form action="{{ route('profile.update', auth()->user()->slug) }}" method="post" enctype="multipart/form-data">

            <div class="my-profile-content">
                <div class="myprofile-area">
                    @if (isset(auth()->user()->image) &&
                            !empty(auth()->user()->image) &&
                            File::exists(public_path('storage/image/' . auth()->user()->image)))
                        <img height="80" width="100" src="{{ asset('storage/image/' . auth()->user()->image) }}"
                            alt="no-p_image" class="img-fluid">
                    @else
                        <img src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                    @endif
                    <label class="input-file">
                        <input type="file" id="myFile" name="image">
                        <span><i class="fa fa-camera"></i></span>
                    </label>
                </div>

            </div>
            <div class="account-pnl mt-3">
                @csrf
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"> <b>Your
                                Info</b></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">
                                    @if (auth()->user()->user_type == 'Employee')
                                        Name
                                    @else
                                        Company Administrator
                                    @endif
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" placeholder="Enter name" name="name"
                                    value="{{ auth()->user()->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ 'Name is a mandatory field' }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" placeholder="Enter email address"
                                    value="{{ auth()->user()->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" placeholder="Phone Number"
                                    value="{{ auth()->user()->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">
                                    @if (auth()->user()->user_type == 'Employee')
                                        Address
                                    @else
                                        Registered Address
                                    @endif

                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="address" placeholder="Enter address"
                                    value="{{ auth()->user()->address }}">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Update Video</label>
                        <input type="file" name="video" value="">
                        @if ($errors->has('video'))
                            <span class="text-danger">{{ $errors->first('video') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <div class="myprofile-video">
                            @if (isset(auth()->user()->video) &&
                                    !empty(auth()->user()->video) &&
                                    File::exists(public_path('storage/Video/' . auth()->user()->video)))
                                <video height="240" controls>
                                    <source src="{{ asset('storage/Video/' . auth()->user()->video) }}" type="video/mp4">
                                </video>
                            @else
                                {{-- <img height="240" src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid"> --}}
                                <p> No video uploaded yet</p>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Facebook</label>
                        <input type="text" name="facebook" placeholder="Facebook link"
                            value="{{ auth()->user()->facebook }}">
                        @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Twitter</label>
                        <input type="text" name="twitter" placeholder="twitter link"
                            value="{{ auth()->user()->twitter }}">
                        @if ($errors->has('twitter'))
                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Github</label>
                        <input type="text" name="github" placeholder="github link"
                            value="{{ auth()->user()->github }}">
                        @if ($errors->has('github'))
                            <span class="text-danger">{{ $errors->first('github') }}</span>
                        @endif
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Dribble</label>
                        <input type="text" name="dribble" placeholder="dribble link"
                            value="{{ auth()->user()->dribble }}">
                        @if ($errors->has('dribble'))
                            <span class="text-danger">{{ $errors->first('dribble') }}</span>
                        @endif
                    </div> --}}

                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Git</label>
                        <input type="text" name="github_link" placeholder="github link"
                            value="{{ auth()->user()->github_link }}">
                        @if ($errors->has('github_link'))
                            <span class="text-danger">{{ $errors->first('github_link') }}</span>
                        @endif
                    </div> --}}
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Linkdin</label>
                        <input type="text" name="linkdin_link" placeholder="linkdin link"
                            value="{{ auth()->user()->linkdin_link }}">
                        @if ($errors->has('linkdin_link'))
                            <span class="text-danger">{{ $errors->first('linkdin_link') }}</span>
                        @endif
                    </div>

                    @if (auth()->user()->user_type == 'Employee')

                        <div class="col-lg-12 ">
                            <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Academic
                                    Info</b></span>
                        </div>
                        <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info">

                            @if (count(auth()->user()->academicsInfos) < 0)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label for="">Degree</label>
                                    <input type="text" name="addMoreInputFields[0][degree]" placeholder="degree">
                                    @if ($errors->has('degree'))
                                        <span class="text-danger">{{ $errors->first('degree') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">School/University</label>
                                    <input type="text" name="addMoreInputFields[0][school]" placeholder="school">
                                    @if ($errors->has('school'))
                                        <span class="text-danger">{{ $errors->first('school') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <label for="">Passing Year</label>
                                    <input type="text" name="addMoreInputFields[0][passing_year]"
                                        placeholder="passing year">
                                    @if ($errors->has('passing_year'))
                                        <span class="text-danger">{{ $errors->first('passing_year') }}</span>
                                    @endif
                                </div>
                            @else
                                @foreach (auth()->user()->academicsInfos as $item)
                                    {{-- <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info"> --}}
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="">Degree</label>
                                        <input type="text" id="degree{{ $item->id }}"
                                            name="addMoreInputFields[0][degree]" placeholder="degree"
                                            value="{{ $item->degree }}">
                                        @if ($errors->has('degree'))
                                            <span class="text-danger">{{ $errors->first('degree') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <label for="">School/University</label>
                                        <input type="text" id="school{{ $item->id }}"
                                            name="addMoreInputFields[0][school]" placeholder="school"
                                            value="{{ $item->school }}">
                                        @if ($errors->has('school'))
                                            <span class="text-danger">{{ $errors->first('school') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="">Passing Year</label>
                                        <input type="text" id="passing_year{{ $item->id }}"
                                            name="addMoreInputFields[0][passing_year]" placeholder="passing year"
                                            value="{{ $item->passing_year }}">
                                        @if ($errors->has('passing_year'))
                                            <span class="text-danger">{{ $errors->first('passing_year') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">


                                        <button type="button" class="btn btn-success btn-sm editItem"
                                            data-id="{{ $item->id }}">
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm removeItem"
                                            data-id="{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group row w-100 ml-1">
                            <div class="col-lg-12 col-md-12">
                                <button type="button" name="add" id="add-product" class="btn btn-primary btn-sm"><i
                                        class="fa fa-plus"></i>&nbsp; Add Education</button>
                            </div>
                        </div>

                    @endif


                    <div class="col-lg-12 ">
                        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">
                            @if (auth()->user()->user_type == 'Employer')
                                <b> Company Info</b>
                            @else
                                <b> Career Info</b>
                            @endif
                        </span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="">
                            @if (auth()->user()->user_type == 'Employer')
                                Company Description
                            @else
                                About yourself
                            @endif

                        </label>
                        <textarea type="text" name="biography" placeholder="Brief description">{{ auth()->user()->biography }}</textarea>
                        @if ($errors->has('biography'))
                            <span class="text-danger">{{ $errors->first('biography') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">
                            @if (auth()->user()->user_type == 'Employer')
                                Year of establishment
                            @else
                                Total Work experience
                            @endif
                        </label>
                        <input type="text" name="experience" placeholder="Total years & months"
                            value="{{ auth()->user()->experience }}">
                        @if ($errors->has('experience'))
                            <span class="text-danger">{{ $errors->first('experience') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">
                            @if (auth()->user()->user_type == 'Employer')
                                Services
                            @else
                                Skills
                            @endif
                        </label>
                        <input type="text" name="skills" placeholder="You may add multiple fields of expertise"
                            value="{{ auth()->user()->skills }}">
                        @if ($errors->has('skills'))
                            <span class="text-danger">{{ $errors->first('skills') }}</span>
                        @endif
                    </div>
                    @if (auth()->user()->user_type == 'Employee')
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Resume</label>
                            <input type="file" class="form-control choose-file" name="resume">
                            @if ($errors->has('resume'))
                                <span class="text-danger">{{ $errors->first('resume') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Resume</label>
                            @if (isset(auth()->user()->resume) &&
                                    !empty(auth()->user()->resume) &&
                                    File::exists(public_path('storage/Resume/' . auth()->user()->resume)))
                                <label><a href="{{ asset('storage/Resume/' . auth()->user()->resume) }}" target="_blank"
                                        rel="noopener noreferrer">Preview Resume</a></label><br>
                            @else
                                <p>No resume</p>
                            @endif

                        </div>
                    @endif
                    @if (auth()->user()->user_type == 'Employer')
                        {{-- <div class="col-lg-12">
                            <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Academic
                                    Info</b></span>
                        </div>
                        <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info">

                            @if (count(auth()->user()->academicsInfos) < 0)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label for="">Degree</label>
                                    <input type="text" name="addMoreInputFields[0][degree]" placeholder="degree">
                                    @if ($errors->has('degree'))
                                        <span class="text-danger">{{ $errors->first('degree') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">School/University</label>
                                    <input type="text" name="addMoreInputFields[0][school]" placeholder="school">
                                    @if ($errors->has('school'))
                                        <span class="text-danger">{{ $errors->first('school') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <label for="">Passing Year</label>
                                    <input type="text" name="addMoreInputFields[0][passing_year]"
                                        placeholder="passing year">
                                    @if ($errors->has('passing_year'))
                                        <span class="text-danger">{{ $errors->first('passing_year') }}</span>
                                    @endif
                                </div>
                            @else
                                @foreach (auth()->user()->academicsInfos as $item) --}}
                        {{-- <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info"> --}}
                        {{-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="">Degree</label>
                                        <input type="text" id="degree{{ $item->id }}"
                                            name="addMoreInputFields[0][degree]" placeholder="degree"
                                            value="{{ $item->degree }}">
                                        @if ($errors->has('degree'))
                                            <span class="text-danger">{{ $errors->first('degree') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <label for="">School/University</label>
                                        <input type="text" id="school{{ $item->id }}"
                                            name="addMoreInputFields[0][school]" placeholder="school"
                                            value="{{ $item->school }}">
                                        @if ($errors->has('school'))
                                            <span class="text-danger">{{ $errors->first('school') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="">Passing Year</label>
                                        <input type="text" id="passing_year{{ $item->id }}"
                                            name="addMoreInputFields[0][passing_year]" placeholder="passing year"
                                            value="{{ $item->passing_year }}">
                                        @if ($errors->has('passing_year'))
                                            <span class="text-danger">{{ $errors->first('passing_year') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <button type="button" class="btn btn-success btn-sm editItem"
                                            data-id="{{ $item->id }}">
                                            Update
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm removeItem"
                                            data-id="{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group row w-100 ml-1">
                            <div class="col-lg-12 col-md-12">
                                <button type="button" name="add" id="add-product" class="btn btn-primary btn-sm"><i
                                        class="fa fa-plus"></i>&nbsp; Add Education</button>
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Other
                                    Details</b></span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" placeholder="This name will show up on posted jobs"
                                value="{{ auth()->user()->company_name }}">
                            @if ($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Company Website</label>
                            <input type="url" name="company_website" placeholder="company website"
                                value="{{ auth()->user()->company_website }}">
                            @if ($errors->has('company_website'))
                                <span class="text-danger">{{ $errors->first('company_website') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Total # of Employee</label>
                            <input type="text" name="company_employee_strength" placeholder="Total employee count "
                                value="{{ auth()->user()->company_employee_strength }}">
                            @if ($errors->has('company_employee_strength'))
                                <span class="text-danger">{{ $errors->first('company_employee_strength') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="">Company Address</label>
                            <input type="text" name="company_address" placeholder="company address"
                                value="{{ auth()->user()->company_address }}">
                            @if ($errors->has('company_address'))
                                <span class="text-danger">{{ $errors->first('company_address') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Company Profile</label>
                            <input type="file" class="form-control choose-file" name="resume">
                            @if ($errors->has('resume'))
                                <span
                                    class="text-danger">{{ 'Company Profile is a mandatory field. Please upload in .pdf or .docx format ' }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Current Company Profile</label>
                            @if (isset(auth()->user()->resume) &&
                                    !empty(auth()->user()->resume) &&
                                    File::exists(public_path('storage/Resume/' . auth()->user()->resume)))
                                <label><a href="{{ asset('storage/Resume/' . auth()->user()->resume) }}" target="_blank"
                                        rel="noopener noreferrer">View Company Profile</a></label><br>
                            @else
                                <p>No document uploaded yet</p>
                            @endif

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Company Logo <span>(max. file size 3MB)</span></label>
                            <input type="file" class="form-control choose-file" name="company_image">
                            @if ($errors->has('company_image'))
                                <span class="text-danger">{{ $errors->first('company_image') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Current Company Logo</label>
                            <img class="ccompany-logo"
                                src="{{ asset('storage/Company_image/' . auth()->user()->company_image) }}"
                                alt="">

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Image Gallery <span>(max.file size 3MB)</span></label>
                            <input type="file" class="form-control choose-file" name="company_image_gal[]" multiple>
                            @if ($errors->has('company_image_gal'))
                                <span class="text-danger">{{ $errors->first('company_image_gal') }}</span>
                            @endif
                        </div>



                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <div class="row">
                                @if (empty(auth()->user()->galaries->toArray()
                                    ))
                                    <p>No image uploded yet
                                    <p>
                                    @else
                                        @foreach (auth()->user()->galaries as $item)
                                            <div class="col-lg-4 col-md-4 col-sm-2 col-xs-12">
                                                <img style="width: 117% !important; height: 124px !important"
                                                    src="{{ asset('storage/CompanyImageGalary/' . $item->company_image_gal) }}"
                                                    alt="" class="company-img">
                                            </div>
                                        @endforeach
                                @endif
                            </div>
                    @endif
                    @if (auth()->user()->user_type == 'Employee')

                        <div class="col-lg-12">
                            <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Company
                                    Background</b></span>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row w-100 align-items-center" id="company_info">

                                @if (count(auth()->user()->user_company_histories) < 0)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="">Company Name</label>
                                        <input type="text" name="addMoreCompaly[0][company_name]"
                                            placeholder="company_name">
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                                        <label for="">Position</label>
                                        <input type="text" name="addMoreCompaly[0][position]" placeholder="position">
                                        @if ($errors->has('position'))
                                            <span class="text-danger">{{ $errors->first('position') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="">Join Date</label>
                                        <input type="text" name="addMoreCompaly[0][join_date]"
                                            placeholder="join_date">
                                        @if ($errors->has('join_date'))
                                            <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <label for="">Resign Date</label>
                                        <input type="text" name="addMoreCompaly[0][leave_date]"
                                            placeholder="leave_date">
                                        @if ($errors->has('leave_date'))
                                            <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                                        @endif
                                    </div>
                                @else
                                    @foreach (auth()->user()->user_company_histories as $item)
                                        {{-- <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info"> --}}
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label for="">Company Name</label>
                                            <input type="text" id="company_name{{ $item->id }}"
                                                name="addMoreCompaly[0][company_name]" placeholder="company_name"
                                                value="{{ $item->company_name }}">
                                            @if ($errors->has('company_name'))
                                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <label for="">Position</label>
                                            <input type="text" id="position{{ $item->id }}"
                                                name="addMoreCompaly[0][position]" placeholder="Position"
                                                value="{{ $item->position }}">
                                            @if ($errors->has('position'))
                                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                                            <label for="" style="font-size: 12px;">Date of Joining</label>
                                            <input type="date" id="join_date{{ $item->id }}"
                                                name="addMoreCompaly[0][join_date]" placeholder="join_date"
                                                value="{{ $item->join_date }}">
                                            @if ($errors->has('join_date'))
                                                <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                                            <label for="" style="font-size: 12px;">Last Working</label>
                                            <input type="date" id="leave_date{{ $item->id }}"
                                                name="addMoreCompaly[0][leave_date]" placeholder="passing year"
                                                value="{{ $item->leave_date }}">
                                            @if ($errors->has('leave_date'))
                                                <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                                            @endif
                                        </div>


                                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
                                            <button type="button" class="btn btn-success btn-sm editCompany"
                                                data-id="{{ $item->id }}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm removeCompany"
                                                data-id="{{ $item->id }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group  w-100 ">
                                <div class="">
                                    <button type="button" name="add" id="add-company"
                                        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Add
                                        Company</button>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="job_title text-center">
                        <button type="submit" class="btn read_more mrgn-30-top">Update</button>
                    </div>
                </div>
        </form>
    </div>
    </div>
@endsection
@section('addmore')
    <script>
        var i = 0;
        $("#add-product").click(function() {
            //  
            ++i;
            $("#acamedic_info").append(
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label for="">Degree</label>' +
                '<input type="text" name="addMoreInputFields[' + i + '][degree]" placeholder="degree">' +
                '</div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><label for="">School/University</label>' +
                '<input type="text" name="addMoreInputFields[' + i + '][school]" placeholder="school">' +
                '</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><label for="">Passing Year</label>' +
                '<input type="text" name="addMoreInputFields[' + i +
                '][passing_year]" placeholder="passing year">');
        });
    </script>
@endsection
@section('addmoreCom')
    <script>
        var i = 0;
        $("#add-company").click(function() {

            ++i;
            $("#company_info").append(
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label for="">Company Name</label>' +
                '<input type="text" name="addMoreCompaly[' + i +
                '][company_name]" placeholder="company_name">' +
                '</div><div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><label for="">Position</label>' +
                '<input type="text" name="addMoreCompaly[' + i +
                '][position]" placeholder="Position"></div><div class="col-lg-3 col-md-2 col-sm-2 col-xs-12"><label for=""  style="font-size: 12px;">Date of Joining</label>' +
                '<input type="date" name="addMoreCompaly[' + i + '][join_date]">' +
                '</div><div class="col-lg-3 col-md-2 col-sm-2 col-xs-12"><label for=""  style="font-size: 12px;">Last Working</label>' +
                '<input type="date" name="addMoreCompaly[' + i +
                '][leave_date]"></div>');
        });
    </script>
@endsection
@section('updateAcademic')
    <script>
        $(document).on('click', '.editItem', function() {
            var data_id = $(this).attr('data-id');
            var degree = document.getElementById("degree" + data_id).value;
            var school = document.getElementById("school" + data_id).value;
            var passing_year = document.getElementById("passing_year" + data_id).value;
            //  alert(passing_year);
            $.ajax({

                type: "get",
                url: "{{ url('update-academic-info') }}",
                data: {
                    'degree': degree,
                    'school': school,
                    'passing_year': passing_year,
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            window.location
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection
@section('deleteAcademic')
    <script>
        $(document).on('click', '.removeItem', function() {
            var data_id = $(this).attr('data-id');
            $.ajax({

                type: "post",
                url: "{{ url('delete-academic-info') }}",
                data: {
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 1000);
                }
            });

        });

        // delete company history

        $(document).on('click', '.removeCompany', function() {
            var data_id = $(this).attr('data-id');
            $.ajax({

                type: "post",
                url: "{{ url('delete-company-history') }}",
                data: {
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection

@section('updateCompany')
    <script>
        $(document).on('click', '.editCompany', function() {
            var data_id = $(this).attr('data-id');
            var company_name = document.getElementById("company_name" + data_id).value;
            var join_date = document.getElementById("join_date" + data_id).value;
            var leave_date = document.getElementById("leave_date" + data_id).value;
            var position = document.getElementById("position" + data_id).value;
            //  alert(passing_year);
            $.ajax({

                type: "get",
                url: "{{ url('update-Company-info') }}",
                data: {
                    'company_name': company_name,
                    'join_date': join_date,
                    'leave_date': leave_date,
                    'position': position,
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            window.location
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection
{{-- @section('image')


<script>
    $(document).on('change', '#myFile', function() {
        alert("image.name");
//         var image = document.getElementById("myFile").files[0];
// alert(image.name);
    //    $.ajax({

    //        type: "POST",
    //        url: "{{ route('uploadImage') }}",
    //        data: {
    //            'image': image,
    //            '_token': '{{ csrf_token() }}'
    //        },
    //        dataType: "JSON",
    //        success: function(response) {
    //            setTimeout(function() {
    //                swal({
    //                    title: "Success!",
    //                    text: response.msg,
    //                    type: "success"
    //                }, function() {
    //                    location.reload();
    //                });
    //            }, 1000);
    //        }
    //    });

   });
</script>
    
@endsection --}}
@include('Admin.sweetAlertMsg')
