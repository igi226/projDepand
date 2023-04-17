@extends('Admin.Main.masterLayout')
@section('title', 'view-user | Defendable Stuffing Agency')
@section('content')

<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="user-profile">
            <div class="row">
              
              <div class="col-lg-8">
                <div class="user-profile-name">{{ $user->name }}</div>
                
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
                          <span class="contact-title">Email:</span>
                          <span class="contact-email">{{ $user->email }}</span>
                        </div>
                        
                      </div>
                      <div class="basic-information">
                        <h4>Basic information</h4>
                        <div class="birthday-content">
                          <span class="contact-title">Join Date:</span>
                          <span class="birth-date">{{ $user->created_at }} </span>
                        </div>
                        <div class="gender-content">
                          <span class="contact-title">Status:</span>
                          <span class="gender">{{ $user->status == 1 ? "Active" : "Inactive" }}</span>
                        </div>
                      </div>

                      <div class="basic-information">
                        <h4>Social information</h4>
                        <div class="birthday-content">
                          <span class="contact-title">Facebook</span>
                          <span class="birth-date">{{ $user->facebook }} </span>
                        </div>
                        <div class="gender-content">
                          <span class="contact-title">Twitter:</span>
                          <span class="gender">{{ $user->twitter }}</span>
                        </div>
                        <div class="gender-content">
                          <span class="contact-title">Github:</span>
                          <span class="gender">{{ $user->github }}</span>
                        </div>
                        <div class="gender-content">
                          <span class="contact-title">Dribble:</span>
                          <span class="gender">{{ $user->dribble }}</span>
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
  <!-- /# row -->
  
    
@endsection