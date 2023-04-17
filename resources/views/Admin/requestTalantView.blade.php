@extends('Admin.Main.masterLayout')

@section('title', 'Requested Talent | Defendable Stuffing Agency')

@section('content')



<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="user-profile">
            <div class="row">
              
              <div class="col-lg-8">
               
                
                <div class="custom-tab user-profile-tab">
                 
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="1">
                     
                      <div class="basic-information">
                        <h4>Request Talent Information</h4>
                        <div class="birthday-content">
                          <span class="contact-title">Job function:</span>
                          <span class="birth-date">{{ $requested_talent->jobfunction }} </span>
                        </div>
                        <div class="birthday-content">
                          <span class="contact-title">Company:</span>
                          <span class="birth-date">{{ $requested_talent->company }}</span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Position Type:</span>
                            <span class="birth-date">{{ $requested_talent->positiontype }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Position Hiring For:</span>
                            <span class="birth-date">{{ $requested_talent->position_hiring_for }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Email Address:</span>
                            <span class="birth-date">{{ $requested_talent->email }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">First Name:</span>
                            <span class="birth-date">{{ $requested_talent->fname	 }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Last Name:</span>
                            <span class="birth-date">{{ $requested_talent->lname }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Job Title:</span>
                            <span class="birth-date">{{ $requested_talent->jobtitle }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Phone Number:</span>
                            <span class="birth-date">{{ $requested_talent->number }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Address:</span>
                            <span class="birth-date">{{ $requested_talent->address }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">City:</span>
                            <span class="birth-date">{{ $requested_talent->city }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">State:</span>
                            <span class="birth-date">{{ $requested_talent->state }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Country:</span>
                            <span class="birth-date">{{ $requested_talent->country }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Zip Code:</span>
                            <span class="birth-date">{{ $requested_talent->zipcode }} </span>
                        </div>
                        <div class="birthday-content">
                            <span class="contact-title">Message:</span>
                            <span class="birth-date">{{ $requested_talent->message }} </span>
                        </div>
<div class="text-center">
    <a href="{{ route('requestTalent') }}" class="btn btn-danger btn-sm">Back</a>
</div>
                      </div>

                    

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    

@endsection

@include('Admin.sweetAlertMsg')