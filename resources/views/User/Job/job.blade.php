@extends('User.Master.mainLayout')

@section('title', 'Job | Dependable Staffing Agency')

@section('content')



    <!--hero section start-->

    <section class="hero-section hero-section-3 pt-50 hero-container pb-4">

        <!--animated circle shape start-->

    

        <!--animated circle shape end-->

        <div class="container">

          <div class="row align-items-center justify-content-center py-5">

                <div class="col-md-12 col-lg-12">

                    <div class=" top-heading text-center">

                        <h2 class="top-heading">{{ $topsection->title }}</h2>

                        <p class="lead">

                            {{ $topsection->short_desc }}

                        </p>

                       <a href="https://dependablestaffingagency.bamboohr.com/jobs/" class="btn solid-btn inner-btn">Submit Resume</a>   &nbsp; &nbsp;<a href="{{ route('employee.allJobs') }}" class="btn solid-btn inner-btn">Search for Jobs</a>

                    </div>

                </div>

           

            </div>

        </div>





		

        <!--shape image end-->

    </section>



    <section id="features" class="feature-section pt-100 pb-20">

        <div class="container">

            <div class="row align-items-center justify-content-between">

                <div class="col-md-4">

                    <div class="download-img">
                        @if (isset($secondsection->image) && !empty($secondsection->image) && File::exists(public_path("storage/CmsImage/" . $secondsection->image)))
                        <img src="{{ asset('storage/CmsImage/'. $secondsection->image) }}" alt="download" class="img-fluid">
                        @else

                        <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image" class="img-fluid">

                    @endif  
                    </div>

                </div>

                <div class="col-md-7">

                    <div class="feature-contents section-heading">

                        <h2>{{ $secondsection->title }}</h2>

                        <p><?php echo html_entity_decode($secondsection->description);?></p>



                    </div>

                </div>

            </div>

        </div>

    </section>

	

	<div id="features" class="feature-section ptb-20">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="section-heading text-center mb-5">

                        <h2>Career Opportunities</h2>

                        <p>At Dependable Staffing Agency, we focus on finding you a role that sets you up for a successful career full of satisfying and demanding opportunities and growth. Connect with us today to find your future job in your preferred field. </p>



                    </div>

                </div>

            </div>



            <!--feature new style start-->

            <div class="row row-grid align-items-center">

                <div class="col-lg-4">

                    <div class="d-flex align-items-start mb-5">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                                 <img src="{{ asset('userAsset/img/Group_25.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                            <h5>Nursing</h5>  

							<p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

							                         

                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-5">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                               <img src="{{ asset('userAsset/img/Group_23.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                           <h5>Registered Nurse</h5>

                            <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

					   <div class="d-flex align-items-start mb-5">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                               <img src="{{ asset('userAsset/img/Group_23.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                           <h5>Licensed Practical Nurse</h5>

                            <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

                    <div class="d-flex align-items-start">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                                 <img src="{{ asset('userAsset/img/Group_25-1.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                           <h5>Licensed Vocational Nurse</h5>

							 <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="position-relative" style="z-index: 10;">

                        <img alt="Image placeholder" src="{{ asset('userAsset/img/career.png') }}" class="img-center img-fluid">

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="d-flex align-items-start mb-5">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                             <img src="{{ asset('userAsset/img/Group_27.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                             <h5>Nursing Assistant Certified</h5>

                            <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-5">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                                <img src="{{ asset('userAsset/img/Group_43.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                             <h5>Nursing Assistant Registered</h5>

                            <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

                    <div class="d-flex align-items-start">

                        <div class="pr-4">

                            <div class="icon icon-shape  rounded-circle">

                             <img src="{{ asset('userAsset/img/Group_28.png') }}">

                            </div>

                        </div>

                        <div class="icon-text">

                             <h5>Home Health Aides</h5>

                            <p class="mb-0">Modular and interchangable componente between layouts and even demos.</p>

                        </div>

                    </div>

                </div>

            </div>

            <!--feature new style end-->

        </div>

    </div>

  	<section class="download-section pt-100 background-img" style="background: url('userAsset/img/app-hero-bg.jpg')no-repeat center center / cover">

        <div class="container">

            <div class="row align-items-center justify-content-between">

                <div class="col-md-12">

                    <div class="download-content pb-100">

                        <h2 class="">{{ $letUs->title }}</h2>

                        <p class="lead">{{ $letUs->short_desc }}</p>



                        <div class="download-btn">

                            <a href="https://dependablestaffingagency.bamboohr.com/jobs/" class="btn google-play-btn mr-3">Submit Resume</a>

                            <a href="{{ route('employee.allJobs') }}" class="btn app-store-btn">Search Jobs</a>

                        </div>

                    </div>

                </div>

                <div class="col-md-5">

                </div>

            </div>

        </div>

    </section>



    <!--promo section start-->

    <section class="promo-section ptb-100">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10 col-md-10">

                    <div class="section-heading text-center mb-5">

                        <h2>{{ $weareTrusted->title }}</h2>

                        <p class="lead">

                            
                            <?php echo html_entity_decode($weareTrusted->description);?>


                        </p>

						

				   </div>

                </div>

				

            </div>

        </div>

    </section>

    <!--promo section end-->

    

@endsection