@extends('User.Master.mainLayout')
@section('title', 'Home-Care | Dependable Staffing Agency')

@section('content')
    




<section class="hero-section hero-section-3 pt-50 hero-container pb-4
">
    <!--animated circle shape start-->

    <!--animated circle shape end-->
    <div class="container">
      <div class="row align-items-center justify-content-center py-5">
            <div class="col-md-12 col-lg-12">
                <div class=" top-heading text-center pt-0">
                    <h2 class="top-heading">Home Care Services</h2>
                    <p class="lead">
                     Compassionate, comprehensive home care for improved quality of life
                    </p>
                   <a href="#homecare" class="btn solid-btn inner-btn">Request In-Home Care Services</a>   
                </div>
            </div>
       
        </div>
    </div>


    
    <!--shape image end-->
</section>
<!--hero section start-->

<section id="contact" class="contact-us  pt-100" id="homecare">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 pb-3 message-box d-none">
                <div class="alert alert-danger"></div>
            </div> --}}
            <div class="col-md-5">
                <div class="section-heading">
                    <h2>Why You Should Trust Dependable Staffing for Home Care Services</h2>
                    <p>Home care involves deep compassion and care for the elderly, disabled, and ill and assists patients with activities of daily living (ADLs) such as feeding, moving, and bathing. It has been our mission to find the right help for our clients’ improved quality of life for more than three decades.</p>
                   <img src="{{ asset('userAsset/img/female-nurse.jpg') }}" alt="download" class="img-fluid">
               </div>
         
            </div>
            <div class="col-md-7">
                <form action="{{ route('careService') }}" method="POST">
                    @csrf
                    <h5>Request Home Health Services</h5>
                    <p>Complete this form or Call us 24/7 at <strong>(253) 252-3957</strong></p>
                    <input type="hidden" name="service_type" value="Home Care Solution">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required">
                            </div>
                        </div>
                          <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" name="phone" value="" class="form-control" id="phone" placeholder="Your Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <input type="text" name="address" value="" size="40" class="form-control" id="company" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-3">
                            <button type="submit" class="solid-btn" style="pointer-events: all; cursor: pointer;">
                              SUBMIT
                            </button>
                            {{-- <button class="btn btn-lg" type="submit" name="submit">
                                Submit
                            </button> --}}
                        </div>
                    </div>
                </form>
                {{-- <p class="form-message"></p> --}}
            </div>
        </div>
    </div>
</section>


<section class="promo-section pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="section-heading text-center mb-5">
                    <h2>Services Available</h2>
                </div>
            </div>
        </div>
        <div class="row equal mb-5 justify-content-center">
            <div class="col-md-4 col-lg-2">
                <div class="single-promo single-promo-hover single-promo-1 single-promo-3 rounded text-center white-bg p-5 h-100">
                    <div class="circle-icon mb-5">
                          <img src="{{ asset('userAsset/img/Rectangle-2.png') }}" alt="download" class="img-fluid">
                    </div>
                    <p>Companions</p>
                </div>
            </div>
               <div class="col-md-4 col-lg-2">
                <div class="single-promo single-promo-hover single-promo-1 single-promo-3 rounded text-center white-bg p-5 h-100">
                    <div class="circle-icon mb-5">
                          <img src="{{ asset('userAsset/img/Rectangle-3.png') }}" alt="download" class="img-fluid">
                    </div>
                    <p>Sitters</p>
                </div>
            </div>
           <div class="col-md-4 col-lg-2">
                <div class="single-promo single-promo-hover single-promo-1 single-promo-3 rounded text-center white-bg p-5 h-100">
                    <div class="circle-icon mb-5">
                           <img src="{{ asset('userAsset/img/Rectangle-4.png') }}" alt="download" class="img-fluid">
                    </div>
                    <p>House<br>keeping</p>
                </div>
            </div>
          <div class="col-md-4 col-lg-2">
                <div class="single-promo single-promo-hover single-promo-1 single-promo-3 rounded text-center white-bg p-5 h-100">
                    <div class="circle-icon mb-5">
                           <img src="{{ asset('userAsset/img/Rectangle-5.png') }}" alt="download" class="img-fluid">
                    </div>
                    <p>General Assistance</p>
                </div>
            </div>
             <div class="col-md-4 col-lg-2">
                <div class="single-promo single-promo-hover single-promo-1 single-promo-3 rounded text-center white-bg p-5 h-100">
                    <div class="circle-icon mb-5">
                          <img src="{{ asset('userAsset/img/Rectangle-6.png') }}" alt="download" class="img-fluid">
                    </div>
                    <p>24-Hour Live-In</p>
                </div>
            </div>
        
        </div>
        
    
        
    </div>
</section>
   <!--promo section start-->
<section class="promo-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="section-heading text-center ">
                    <h2>We provide care for clients 24 Hours a day, seven days a week in their home and various settings:
                   </h2>
                    
                </div>
            </div>
        </div>
        <div class="row equal justify-content-center">
            <div class="col-lg-3 col-md-12">
              <div class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 h-100">
                     <a href=""> <div class="circle-icon ">
                       <img src="{{ asset('userAsset/img/01.jpg') }}" class="img-fluid"> 
                    </div>
                    <h5>Nursing Homes</h5></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 h-100">
                    <a href=""><div class="circle-icon ">
                        <img src="{{ asset('userAsset/img/02.jpg') }}" class="img-fluid"> 
                    </div>
                     <h5>Boarding Homes</h5></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
               <div class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 h-100">
                    <a href=""> <div class="circle-icon ">
                          <img src="{{ asset('userAsset/img/03.jpg') }}" class="img-fluid"> 
                    </div>
                   <h5>Assisted Living</h5></a>
                </div>
            </div>
                   <div class="col-lg-3 col-md-12">
               <div class=" single-promo-hover single-promo-2 rounded text-center white-bg p-5 h-100">
                     <a href=""><div class="circle-icon ">
                         <img src="{{ asset('userAsset/img/04.jpg') }}" class="img-fluid"> 
                    </div>
                      <h5>Retirement Communities</h5></a>
                </div>
            </div>
            

        </div>
    </div>
</section>

<section class="download-section pt-50 background-img" style="background: linear-gradient(rgba(0, 0, 0, 0.84), rgba(0, 0, 0, 0.88)),url('img/app-hero-bg.jpg')no-repeat center center / cover">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-7">
                <div class="download-content text-white pb-60 ">
                    <p class="lead">At Dependable Staffing, we uphold the highest professional and performance standards. That’s why our clients and patients have consistently placed trust and confidence in us over more than 30 years of serving Seattle. We have a meticulous screening process for hiring our employees and hire only the best-trained and most qualified service professionals.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="et_pb_text_inner"><span>30</span>Years of <br>Experience</div>
            </div>
        </div>
    </div>
</section>

@endsection
@include('Admin.sweetAlertMsg')
