 <!--header section start-->
 <header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top custom-nav white-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('storage/SiteImages/'. $site_info->logo_image) }}" alt="logo" class="img-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-menu"></span>
        </button>

            <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('job') }}">Job</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('employee.allJobs') }}">Apply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('client') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('about-us') }}">About Us</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('facilities') }}">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('resources') }}">Resources</a>
                    </li> 

                    
                    @endguest
                    @auth
                        
                    
                    @if (auth()->user()->user_type == "Employer")
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('facilities') }}">Facilities</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('resources') }}">Resources</a>
                    </li> 
                    @endif
                   
                    
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('patient-referrals') }}">Patient Referrals</a>
                    </li> 
                    @if (Route::has('login'))
                    @auth
                    <li>
                    <div class="nav-item dropdown">
                        <a href="javacsript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu shadow-sm m-0">
                            @if (Auth::user()->user_type == "Employer")
                            <a href="{{ route('employer.home') }}" class="dropdown-item pr-2">Employer Profile</a>

                                
                           @else
                            <a href="{{ route('employee.home') }}" class="dropdown-item">Employee Profile</a>
                            @endif
                            <a class="ml-3" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                          
                            
                        </div>
                    </div>
                </li>
                    {{-- <li>
                       
                     </li> --}}
                    @else
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('login') }}"><i class="fa fa-arrow-right"></i> Sign In</a>
                    </li>
                    @endauth
                    @endif
                    @auth
                        
                   
@if (auth()->user()->user_type == "Employer")
<li class="nav-item">
    <a href="{{ route('employer.postJob') }}" class="btn  post-job" target="_blank"><i class="fa fa-file"></i> Post A Job</a>
</li>
@endif
@endauth
                    
                    <li class="nav-item">
                        <a href="#" class="" target="_blank"></a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!--end navbar-->
</header>
<!--header section end-->