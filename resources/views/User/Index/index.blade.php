

@extends('User.Master.mainLayout')

@section('title', 'Home | Dependable Staffing Agency')



@section('content')



 <!--hero section start-->

 <section class="hero-section hero-section-3 ptb-100">

    <div class="banner-section">

        <img src="{{  asset('storage/CmsImage/'. $banner_content->image) }}" alt="">

        <div class="banner-section-title">

            <h2>{{ $banner_content->title }}</h2>

            <h4>{{ $banner_content->short_desc }}</h4>

            <div class="banner-section-btn">

                <a href="{{ url('client') }}" class="request-btn">Request Talent</a>

                <a href="{{ route('employee.allJobs') }}" class="job-btn">Search for Jobs</a>

            </div>

        </div>

    </div>

</section>

<!--hero section end-->



<!--promo section start-->

<section class="promo-section ptb-20">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-8">

                <div class="section-heading text-center mb-5">

                    <h2>Easiest Way to Use</h2>

                </div>

            </div>

        </div>

        <div class="row equal">

            <div class="col-md-4 col-lg-4">

                <div

                    class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">

                    <div class="circle-icon mb-5">

                        <span class="text-white img-wrapper">

                            <img src="{{ asset('userAsset/img/search.png') }}"

                                onmouseover="this.src='{{ asset('userAsset/img/search-copy.png') }}'"

                                onmouseout="this.src='{{ asset('userAsset/img/search.png') }}'" border="0"

                                alt="" />

                        </span>

                    </div>

                    <h5>Browse Jobs</h5>

                    <p>Create an account and access your saved settings on any device.</p>

                </div>

            </div>

            <div class="col-md-4 col-lg-4">

                <div

                    class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">

                    <div class="circle-icon mb-5">

                        <span class=" text-white"> <img src="{{ asset('userAsset/img/vacancy.png') }}"

                                onmouseover="this.src='{{ asset('userAsset/img/vacancy-hover.png') }}'"

                                onmouseout="this.src='{{ asset('userAsset/img/vacancy.png') }}'" border="0"

                                alt="" /></span>

                    </div>

                    <h5>Find Your Vacancy</h5>

                    <p>Don't just find. Be found. Put your CV in front of great employers..</p>

                </div>

            </div>

            <div class="col-md-4 col-lg-4">

                <div

                    class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">

                    <div class="circle-icon mb-5">

                        <span class="text-white"> <img src="{{ asset('userAsset/img/apply.png') }}"

                                onmouseover="this.src='{{ asset('userAsset/img/apply-hover.png') }}'"

                                onmouseout="this.src='{{ asset('userAsset/img/apply.png') }}'" border="0"

                                alt="" /></span>

                    </div>

                    <h5>Submit Resume</h5>

                    <p>Your next career move starts here. Choose Job from thousands of companies</p>

                </div>

            </div>

        </div>

    </div>

</section>

<!--promo section end-->



<!--promo section start-->

<section class="promo-section ptb-20">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-8">

                <div class="section-heading text-center ">

                    <h2>Career Opportunities </h2>

                    <p>At Dependable Staffing Agency, we focus on finding you a role that sets you up for a successful career full of satisfying and demanding opportunities and growth. Connect with us today to find your future job in your preferred field.</p>

                </div>

            </div>

        </div>

        <div class="row equal justify-content-center">

            <div class="col">

                <div

                    class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 circle-border h-100">

                    <div class="circle-icon ">

                        <img src="{{ asset('medical-travel.png') }}" class="img-fluid">

                    </div>

                    <h5>Medical & Travel</h5>

                </div>

            </div>

            <div class="col">

                <div

                    class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 circle-border h-100">

                    <div class="circle-icon ">

                        <img src="{{ asset('office-administrative.png') }}" class="img-fluid">

                    </div>

                    <h5>Office Administrative </h5>

                </div>

            </div>

            <div class="col">

                <div

                    class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 circle-border h-100">

                    <div class="circle-icon ">

                        <img src="{{ asset('technology-it.png') }}" class="img-fluid">

                    </div>

                    <h5>Technology & IT</h5>

                </div>

            </div>

            <div class="col">

                <div

                    class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 circle-border h-100">

                    <div class="circle-icon ">

                        <img src="{{ asset('executive-professionals.png') }}" class="img-fluid">

                    </div>

                    <h5>Executive Professionals</h5>

                </div>

            </div>

            <div class="col">

                <div

                    class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 circle-border h-100">

                    <div class="circle-icon ">

                        <img src="{{ asset('legal-services.png') }}" class="img-fluid">

                    </div>

                    <h5>Legal Services</h5>

                </div>

            </div>



            {{-- <div class="col-md-12 col-lg-3 text-center text-black mt-4">

                <!-- <a href="" class="text-black font-weight-bolder">View All Categories</a> -->

                <a href="#" class="btn solid-btn">View All Categories</a>

            </div> --}}

        </div>

    </div>

</section>

<!--promo section end-->



<!--overflow block start-->

<div class="overflow-hidden">

    <!--about us section start-->

    <section id="about" class="about-us ptb-20 background-shape-img">

        <div class="container">
            <h2 class="mb-4">Why You Choose Job Among Other Job Site?</h2>
            <div class="row align-items-center justify-content-between">

                <div class="col-md-8">

                    <div class="about-content-left section-heading">

                       

                        <div class="row">

                            <div class="col-md-6">

                                <div class="border-box">

                                    <h5 class="red-title child">Choose the best talent form our talent pool. </h5>

                                    <p class="child">If success is a process with a number of defined steps.

                                    </p>

                                    <div class="text-right sm-icon child">

                                        <img src="{{ asset('userAsset/img/best-people.png') }}"

                                            class="child">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="border-box">

                                    <h5 class="red-title child">Having clarity of purpose and a clear picture of what you desire.</h5>

                                    <p class="child">Having clarity of purpose and a clear picture of what you

                                        desire.</p>

                                    <div class="text-right sm-icon child">

                                        <img src="{{ asset('userAsset/img/Union 5.png') }}">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row pt-20">

                            <br>

                            <div class="col-md-6">

                                <div class="border-box">

                                    <h5 class="red-title child">Understand your needsand get the right candidate accordingly.</h5>

                                    <p class="child">Introspection is the trick. Understand what you want.</p>

                                    <div class="text-right sm-icon child">

                                        <img src="{{ asset('userAsset/img/recruitment.png') }}">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="border-box">

                                    <h5 class="red-title child">You can hire or outsource candidates globally.  </h5>

                                    <p class="child">There are basically six key areas to higher achievement.

                                    </p>

                                    <div class="text-right sm-icon child">

                                        <img src="{{ asset('userAsset/img/global.png') }}">

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>

                </div>

                <div class="col-md-4">

                    <div class="about-content-right ">

                        <img src="{{ asset('userAsset/img/Group 1526.png') }}" alt="about us"

                            class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--about us section end-->

</div>

<!--overflow block end-->



<section class=" ptb-100">

    <div class="container">

        <div class="row justify-content-center ptb-50"

            style="background: linear-gradient(50.48deg, #42ded1 -2.06%, #da5564 93.55%);">

            <div class="col-md-8">

                <div class="video-promo-content mt-4 text-center">

                    <h4 class="mt-4 text-white">Looking for Home Care Services?</h4>

                    <p class="text-white">Compassionate, comprehensive home care for improved quality of life

                    </p>

                    <div class="download-btn mt-5">

                        <a href="{{ url('home-Care-Solutions') }}" class="btn google-play-btn mr-3"> Visit Home Care

                            Solutions</a>

                        <a href="{{ url('home-health-Solutions') }}" class="btn app-store-btn"> Visit Home Health Solutions</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





<!--our team section start-->

<section id="team" class="team-member-section ptb-20">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-sm-6">

                <div class="color-div">

                    <h3 class="text-white"> 2500+</h3>

                    <h5 class="text-white">Healthcare Professionals Nationwide</h5>

                </div>

                <br>

                <div class="row">

                    <div class="col-lg-12 col-sm-12">

                        <img src="{{ asset('userAsset/img/cdc-Y2lUjUiay-o-unsplash (1).png') }}">

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><br>

                        <img src="{{ asset('userAsset/img/pexels-karolina-grabowska-8539153.png') }}">

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><br>

                        <img src="{{ asset('userAsset/img/NoPath - Copy.png') }}">

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><br>

                        <img src="{{ asset('userAsset/img/NoPath.png') }}">

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><br>

                        <img src="{{ asset('userAsset/img/pexels-cedric-fauntleroy-4269932.png') }}">

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-sm-6">

                <div>

                    <img src="{{ asset('userAsset/img/pexels-laura-james-6098057.png') }}">

                </div>

                <div class="row">

                    <div class="col-lg-6 col-sm-6"><br>

                        <div class="color-div3">

                            <h5 class="text-white">Genuine Recruiters</h5>

                        </div>

                    </div>

                    <div class="col-lg-6 col-sm-6"><br>

                        <div class="color-div4">

                            <h5 class="text-white">Prominent Staffing</h5>

                        </div>

                    </div>

                    <div class="col-lg-12- col-sm-12"><br>

                        <div class="color-div5">

                            <h4 class="text-white">Global<br> Placement</h4>

                        </div>

                    </div>

                    <div class="col-lg-12 col-sm-12"><br>

                        <img src="{{ asset('userAsset/img/pexels-klaus-nielsen-6303590.png') }}">

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-sm-6">

                <div class="row">

                    <div class="col-lg-6 col-sm-6">

                        <div class="color-div2">

                            <h3 class="text-white"> 27x7</h3>

                            <h5 class="text-white">Live Support</h5>

                        </div>

                    </div>

                    <div class="col-lg-6 col-sm-6">

                        <div class="color-div3">

                            <h5 class="text-white">Easy<br> Application <br>Process</h5>

                        </div>

                    </div>



                    <div class="col-lg-12 col-sm-12"><br>

                        <img src="{{ asset('userAsset/img/pexels-anna-shvets-4421494.png') }}">

                    </div>

                    <div class="col-lg-12 col-sm-12"><br>

                        <img src="{{ asset('userAsset/img/pexels-rodnae-productions-6129507.png') }}">

                    </div>

                    <div class="col-lg-12 col-sm-12"><br>

                        <img src="{{ asset('userAsset/img/pexels-anna-shvets-3845689.png') }}">

                    </div>



                </div>

            </div>

        </div>

</section>

<!--our team section end-->





<section id="download" class="video-promo ptb-20">

    <div class="container">

        <div class="row align-items-center justify-content-between">

            <div class="col-md-4">

                <div class="download-img mt-lg-5 mt-md-5 mt-sm-0">

                    <img src="{{ asset('userAsset/img/Body iPhone 13.png') }}" alt="download"

                        class="img-fluid">

                </div>

            </div>

            <div class="col-md-8">

                <div class="download-content">

                    <h2>Do More with <br>Our Mobile Application</h2>

                    <div class="download-btn mt-4">

                        <img src="{{ asset('userAsset/img/Group 1518.png') }}" alt="download"

                            class="img-fluid">

                        <img src="{{ asset('userAsset/img/Group 1525.png') }}" alt="download"

                            class="img-fluid">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="customer-review-section ptb-20 ">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6">

                <div class="media author-info mb-3 box1">

                    <div class="author-img mr-3">

                        <img src="{{ asset('userAsset/img/e.png') }}" />

                    </div>

                    <div class="media-body">

                        <span class="red-title chid1">Jobseekers</span>

                        <h5 class="mb-0 chid1">Looking For Job?</h5>



                    </div>

                    <div class="media-body text-right">

                        <a href="{{ route('employee.allJobs') }}" class="btn solid-btn">APPLY NOW</a>



                    </div>

                </div>

            </div>

            <div class="col-md-6 col-sm-6 col-lg-6">

                <div class="media author-info mb-3 box1">

                    <div class="author-img mr-3">

                        <img src="{{ asset('userAsset/img/r.png') }}">

                    </div>

                    <div class="media-body">

                        <span class="red-title chid1">Recruiter</span>

                        <h5 class="mb-0 chid1">Are You Recruiting?</h5>



                    </div>

                    <div class="media-body text-right">

                        <a href="{{ route('employer.postJob')}}" class="btn solid-btn">APPLY NOW</a>



                    </div>

                </div>

            </div>



        </div>

    </div>

</section>







<!--screenshots section start-->

<section id="screenshots" class="screenshots-section ptb-100 gray-light-bg">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="section-heading text-center">

                    <h2>Our Team Members</h2>

                </div>

            </div>

        </div>

        <!--start app screen carousel-->

        <div class="screen-slider-content mt-5">

            <div class=""></div>

            <div class="screen-carousel owl-carousel owl-theme dot-indicator">
                @php
                    $members = DB::table('team_mem_bers')->get();
                @endphp
                @foreach ($members as $member)
                    
                
                <div class="single-team-member position-relative">

                    <div class="team-image">

                        {{-- <img src="{{ asset('userAsset/img/team-4.jpg') }}" alt="Team Members"

                            class="img-fluid rounded"> --}}
                            @if (isset($member->image) && !empty($member->image) && File::exists(public_path("storage/MemberImage/" . $member->image)))
                            <img src="{{ asset('storage/MemberImage/'. $member->image) }}" alt="Team Members" class="img-fluid rounded">
                            @else
    
                            <img src="{{asset('noimg.png')}}" alt="no-p_image" class="img-fluid">
    
                        @endif  

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">{{ $member->name }}</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="{{ $member->facebook }}"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="{{ $member->twitter }}"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="{{ $member->github }}"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="{{ $member->dribbble }}"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div>
                @endforeach
                {{-- <div class="single-team-member position-relative">

                    <div class="team-image">

                        <img src="{{ asset('userAsset/img/team-1.jpg') }}" alt="Team Members"

                            class="img-fluid rounded">

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">Edna Mason</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div>

                <div class="single-team-member position-relative">

                    <div class="team-image">

                        <img src="{{ asset('userAsset/img/team-2.jpg') }}" alt="Team Members"

                            class="img-fluid rounded">

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">Edna Mason</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div>

                <div class="single-team-member position-relative">

                    <div class="team-image">

                        <img src="{{ asset('userAsset/img/team-3.jpg') }}" alt="Team Members"

                            class="img-fluid rounded">

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">Edna Mason</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div>

                <div class="single-team-member position-relative">

                    <div class="team-image">

                        <img src="{{ asset('userAsset/img/team-4.jpg') }}" alt="Team Members"

                            class="img-fluid rounded">

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">Edna Mason</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div>

                <div class="single-team-member position-relative">

                    <div class="team-image">

                        <img src="{{ asset('userAsset/img/team-1.jpg') }}" alt="Team Members"

                            class="img-fluid rounded">

                    </div>

                    <div

                        class="team-info text-white rounded d-flex flex-column align-items-center justify-content-center">

                        <h5 class="mb-0">Edna Mason</h5>

                        <h6></h6>

                        <ul class="list-inline team-social social-icon mt-4 text-white">

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-facebook"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-twitter"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-github"></span></a></li>

                            <li class="list-inline-item"><a href="#"><span

                                        class="ti-dribbble"></span></a></li>

                        </ul>

                    </div>

                </div> --}}

            </div>

        </div>

        <!--end app screen carousel-->



    </div>

</section>

<!--screenshots section end-->



    

@endsection
@include('Admin.sweetAlertMsg')
