<?php
use App\Models\Notification;
$notification = Notification::where('receiver_id', auth()->user()->id)->latest()->take(5)->get();;
// dd($notification);

?>

@extends('User.Master.mainLayout')
@section('title', 'EmployerDashboard | Dependable Staffing Agency')
@section('content')

<main id="maincontent">
    <section class="manage pt-4">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-3 col-md-3">
                 
                    <div class="Resume sidebarNav">
                    
                        <ul class="unstyled">
                            
                            @if (auth()->user()->user_type == 'Employer')
                            <li class="{{ Route::is('employer.home') ? 'active' : '' }}"><a href="{{ route('employer.home') }}"><i class="fa fa-user-circle-o"></i> My Account</a></li>

                            <li class="{{ Route::is('employer.postJob') ? 'active' : '' }}"><a  href="{{ route('employer.postJob') }}"><i class="fa fa-briefcase"></i> Post a Job</a></li>
                            <li class="{{ Route::is('employer.postedJobs') ? 'active' : '' }}"><a href="{{ route('employer.postedJobs') }}"><i class="fa fa-suitcase"></i> Posted Jobs</a></li>

                            <li class="{{ Route::is('employer.applicantList') ? 'active' : '' }}"><a href="{{ route('employer.applicantList') }}"><i class="fa fa-address-card-o"></i> Applicant List</a></li>
                            
                         
                            @else
                            <li class="active"><a href="{{ route('employee.home') }}"><i class="fa fa-user-circle-o"></i> My Account</a></li>

                            <li><a href="{{ route('employee.myApplication') }}"><i class="fa fa-briefcase"></i>Applied Jobs</a></li>
                            <li><a href="{{ route('employee.sotilistedApplication') }}"><i class="fa fa-suitcase"></i> Shortlisted</a></li>
                            {{-- <li><a href=""><i class="fa fa-briefcase"></i> Applied Jobs</a></li> --}}
                            <li><a href="{{ route('employee.favouriteJobs') }}"><i class="fa fa-heart"></i> Favorite Jobs</a></li>
                            <li><a href="{{ route('employee.allJobs') }}"><i class="fa fa-search"></i> Find Jobs</a></li>
                            
                            
                            @endif
                            <li class="dropdown">
                              <a href="{{ route('notifications') }}" id="navbarDropdownMenuLink"
                              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-bell"></i> Notifications
                              
                              <span class="badge rounded-pill badge-notification bg-danger noti-msg">{{ $notification->count() }}</span>
                            </a>
                                {{--  --}}
                    
                   {{-- <div class="dropdown">
                    <a class="me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">{{ $notification->count() }}</span>
                    </a> --}}
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach ($notification as $item)
                      <li>
                        <a class="dropdown-item alert-info" href="#">{{ $item->msg }}</a>
                    </li> 
                      @endforeach 
                        
                        
                    </ul>--}}
               
              {{--  --}}
                            </li>
                            <li><a href="{{ route('chat') }}"><i class="fa fa-comments"></i> Chat</a></li>
                           
                            {{-- <li><a href=""><i class="fa fa-unlock-alt"></i> Change Password</a></li> --}}
                            {{-- <li class="border-none"><a href="{{ route('logout') }}"><i class="fa fa-caret-right"></i> Sign Out</a></li> --}}
                            <li><a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> 
                             Sign Out
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="dashboardblock">
                        @yield('contentt')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>      
@endsection
{{-- @section('search')
    <script>
        const searchFocus = document.getElementById('search-focus');
const keys = [
  { keyCode: 'AltLeft', isTriggered: false },
  { keyCode: 'ControlLeft', isTriggered: false },
];

window.addEventListener('keydown', (e) => {
  keys.forEach((obj) => {
    if (obj.keyCode === e.code) {
      obj.isTriggered = true;
    }
  });

  const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

  if (shortcutTriggered) {
    searchFocus.focus();
  }
});

window.addEventListener('keyup', (e) => {
  keys.forEach((obj) => {
    if (obj.keyCode === e.code) {
      obj.isTriggered = false;
    }
  });
});
     </script>
@endsection --}}


