@extends('Admin.Main.masterLayout')
@section('title', 'view-member | Defendable Stuffing Agency')
@section('content')

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="user-profile">
            <div class="row">
               <div class="col-lg-4">
                <div class="user-photo m-b-30">
                  @if (isset($member->image) && !empty($member->image) && File::exists(public_path("storage/MemberImage/" . $member->image)))
                        <img class="img-fluid" src="{{ asset('storage/MemberImage/'.$member->image)}}" alt="" />
                  @else
                        <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image">
                  @endif   
                </div>
            </div>   
              <div class="col-lg-8">
                <div class="user-profile-name">{{ $member->name }}</div>
                
                <div class="custom-tab user-profile-tab">
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="1">
                      <div class="contact-information">
                        <h4>Contact information</h4>
                        
                        <div class="email-content">
                          <span class="contact-title">Facebook:</span>
                          <a href="{{ $member->facebook }}" target="_blank" rel="noopener noreferrer">Visit Facebook</a>
                        </div>
                        <div class="email-content">
                            <span class="contact-title">Twitter:</span>
                            <a href="{{ $member->twitter }}" target="_blank" rel="noopener noreferrer">Visit Twitter</a>
                          </div>
                          <div class="email-content">
                            <span class="contact-title">Git:</span>
                            <a href="{{ $member->github }}" target="_blank" rel="noopener noreferrer">Visit Git</a>
                          </div>
                          <div class="email-content">
                            <span class="contact-title">Dribbble:</span>
                            <a href="{{ $member->dribbble }}" target="_blank" rel="noopener noreferrer">Visit Dribbble</a>
                          </div>
                        
                      </div>
                      <div class="basic-information">
                        <h4>Basic information</h4>
                        <div class="birthday-content">
                          <span class="contact-title">Join Date:</span>
                          <span class="birth-date">{{ $member->created_at }} </span>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
                <a href="{{ route('members.index') }}" class="btn btn-danger btn-sm">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /# row -->
  
    

  
    
@endsection