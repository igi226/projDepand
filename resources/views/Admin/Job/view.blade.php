@extends('Admin.Main.masterLayout')
@section('title', 'view-Job | Defendable Stuffing Agency')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="user-profile">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="user-profile-name"><b>Title:</b> {{ ' '.$jobs->title }}</div>
                     <div class="custom-tab user-profile-tab">
                        <ul class="nav nav-tabs" role="tablist">
                           <li role="presentation" class="active">
                              <h4  h4ria-controls="1" role="tab" data-toggle="tab">Job Info</h4>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <div class="email-content">
                                    <span class="text-dark"><b>Employer Name:</b> </span>
                                    <span class="contact-email">{{ $jobs->user->name }} ({{ $jobs->user->email }})</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Department Name:</b> </span>
                                    <span class="contact-email">{{ $jobs->department->name }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Description</b> :</span>
                                    <span class="contact-email"> <?php echo html_entity_decode($jobs->description);?> </span>
                                 </div>
                                 <hr>
                                 <br>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Location</b> :</span>
                                    <span class="contact-email">{{ $jobs->location }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Type</b> :</span>
                                    <span class="contact-email">{{ $jobs->type }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Experience</b>:</span>
                                    <span class="contact-email">{{ $jobs->experience }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Compensation</b>:</span>
                                    <span class="contact-email">{{ $jobs->compensation }}</span>
                                 </div>
                                 <hr>

                                 <div class="email-content">
                                    <span class="text-dark"><b>Posted At</b>:</span>
                                    <span class="contact-email">{{  Carbon\Carbon::parse($jobs->created_at)->format('D, d M Y H:i') }}</span>
                                 </div>

                                 <div class="email-content">
                                    <span class="text-dark"><b> Last Date of Application</b>:</span>
                                    <span class="contact-email">{{  Carbon\Carbon::parse($jobs->application_last_date)->format('D, d M Y H:i') }}</span>
                                 </div>
                                 <hr>

                              </div>
                              {{-- 
                              <div class="basic-information">
                                 <h4>Basic information</h4>
                                 <div class="birthday-content">
                                    <span class="text-dark">Join Date:</span>
                                    <span class="birth-date">{{ $jobs->created_at }} </span>
                                 </div>
                              </div>
                              --}}
                           </div>
                        </div>
                     </div>

                     {{-- Company --}}
                     <div class="custom-tab user-profile-tab">
                        <ul class="nav nav-tabs" role="tablist">
                           <li role="presentation" class="active">
                              <h4  h4ria-controls="1" role="tab" data-toggle="tab">Company Info</h4>

                           </li>
                        </ul>
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <div class="email-content">
                                    <span class="text-dark"><b>Company Name:</b> </span>
                                    <span class="contact-email">{{ $jobs->user->company_name }} </span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Company Profile:</b> </span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->resume) && isset($jobs->user->resume) && File::exists(public_path('storage/Resume/' . $jobs->user->resume)))
                                            <a href="{{ asset('storage/Resume/'.$jobs->user->resume) }}" class="text-primary"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                                class="fa fa-download font-size-18"></i></a>
                                        @else
                                            No data
                                        @endif
                                    </span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Company Description</b> :</span>
                                    <span class="contact-email"> <?php echo html_entity_decode($jobs->user->biography);?> </span>
                                 </div>
                                 <hr>
                                 <br>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Year of establishment</b> :</span>
                                    <span class="contact-email">{{ $jobs->user->experience }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Company Website</b> :</span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->company_website) )
                                            <a href="{{ $jobs->user->company_website }}" target="_blank" rel="noopener noreferrer">Visit</a>
                                        @else
                                        Not Provided
                                        @endif
                                       
                                    </span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Total # of Employees </b>:</span>
                                    <span class="contact-email">{{ $jobs->user->company_employee_strength }}</span>
                                 </div>
                                 <hr>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Company Address</b>:</span>
                                    <span class="contact-email">{{ $jobs->user->company_address }}</span>
                                 </div>
                                 <hr>

                                 <div class="email-content">
                                    <span class="text-dark"><b>Video</b>:</span>
                                    <span class="contact-email">
                                        @if (isset($jobs->user->video) && !empty($jobs->user->video) && File::exists(public_path('storage/Video/' . $jobs->user->video)))
                                            <a href="{{ asset('storage/Video/' . $jobs->user->video) }}" target="_blank" rel="noopener noreferrer">View</a>
                                        @else
                                            No profile uploaded
                                        @endif
                                    </span>
                                 </div>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Facebook</b>:</span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->facebook) )
                                            <a href="{{ $jobs->user->facebook }}" target="_blank" rel="noopener noreferrer">Visit</a>
                                        @else
                                            Not Provided
                                        @endif
                                    </span>
                                 </div>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Twitter</b>:</span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->twitter) )
                                            <a href="{{ $jobs->user->twitter }}" target="_blank" rel="noopener noreferrer">Visit</a>
                                        @else
                                            Not Provided
                                        @endif
                                    </span>
                                 </div>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Github</b>:</span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->github) )
                                            <a href="{{ $jobs->user->github }}" target="_blank" rel="noopener noreferrer">Visit</a>
                                        @else
                                            Not Provided
                                        @endif
                                    </span>
                                 </div>
                                 <div class="email-content">
                                    <span class="text-dark"><b>Linkdin</b>:</span>
                                    <span class="contact-email">
                                        @if (!empty($jobs->user->linkdin_link) )
                                            <a href="{{ $jobs->user->linkdin_link }}" target="_blank" rel="noopener noreferrer">Visit</a>
                                        @else
                                            Not Provided
                                        @endif
                                    </span>
                                 </div>
                                 <hr>

                              </div>
                              
                           </div>
                        </div>
                     </div>
                     {{-- Company --}}
                     <a href="{{ route('jobs.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /# row -->
@endsection