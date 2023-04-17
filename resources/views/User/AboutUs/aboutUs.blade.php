@extends('User.Master.mainLayout')
@section('title', 'About-Us | Dependable Staffing Agency')
@section('content')


<section class="hero-section hero-section-3 pt-50 hero-container pb-3">
    <!--animated circle shape start-->

    <!--animated circle shape end-->
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-12 col-lg-12 text-center">
                <div class="top-heading ptb-100">
                    <h2 class="font-weight-bold top-heading">About Dependable Staffing Agency</h2>
                    <p class="lead">Providing the highest quality
                          and professional services since 1989. </p>
                </div>
            </div>
        
        
        </div>
    </div>

    
    <!--shape image end-->
</section>


<!--promo section start-->
<section class="promo-section pt-50 pb-20">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7">
                <div class="section-heading text-center mb-5">
                    <h2>{{ $about1->title }}</h2>
                    <p class="lead">
                        {{ $about1->short_desc }}

                    </p>
                </div>
            </div>
              <div class="col-lg-12 col-md-12">
                <div class="section-heading text-center mb-5 text-left">
                 
                    <div class="text-center">
                    {{-- <img src="{{ asset('userAsset/img/logo.png') }}" alt="wave shape" class="img-fluid"> --}}
                    @if (isset($about1->image) && !empty($about1->image) && File::exists(public_path("storage/CmsImage/" . $about1->image)))
                        <img src="{{ asset('storage/CmsImage/'. $about1->image) }}" alt="wave shape" class="img-fluid">
                        @else

                        <img src="{{asset('noimg.png')}}" alt="no-p_image" class="img-fluid">

                    @endif  
                    </div>
                </div>
            </div>
             <div class="col-lg-12 col-md-12">
                <div class="section-heading text-center mb-5">
                   <p class="text-left">
                    <?php echo html_entity_decode($about1->description);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!--promo section end-->
<section class="download-section pt-50 background-img p-10" style="background: linear-gradient(rgba(0, 0, 0, 0.84), rgba(0, 0, 0, 0.88)),url('{{ asset('storage/CmsImage/'. $about2->image ) }}') no-repeat center center / cover">
    <div class="container">                                                                                                             
        <div class="row align-items-center justify-content-between">
            <div class="col-md-7">
                <div class="download-content text-white pb-60 ">
                    <h2 class="text-white">{{ $about2->title }}</h2>
                    <p class="lead"><?php echo html_entity_decode($about2->description);?>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="et_pb_text_inner"><span>{{ $about3->title }}</span>{{ $about3->short_desc }} <br><?php echo html_entity_decode($about3->description);?>.</div>
            </div>
        </div>
    </div>
</section>
  <!--promo section start-->
<section class="promo-section pt-50 pb-20">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="section-heading text-center mb-5">
                    <h2>{{ $about4->title }}</h2>
                </div>
            </div>
              <div class="col-lg-6 col-md-12">
                <div class="section-heading text-center mb-5 text-left">
                    <p class="text-left">
                        <?php echo html_entity_decode($about4->description);?>.
                    </p>
                </div>
            </div>
             <div class="col-lg-6 col-md-12">
                <article class="post">
                    <div class="post-wrapper">
                        <div class="post-header">
                            <h1 class="post-title">Job Placement</h1>
                        </div>
                        <div class="post-content">
                            <p>Dependable Staffing Agency develops and empowers the next generation of professionals with the highest quality training and educational experience possible.
                             At Dependable Staffing Agency, your success is our success! For more information, please call (253) 252-3957.</p>
                            <a href="{{ url('resources') }}"  class="btn solid-btn btn-block btn-not-rounded mt-3">Submit Resume</a>
                        </div>
                    </div>
                </article>
            </div>
        
            
        </div>
    </div>
</section>
<!--promo section end-->

<section class=" ptb-100">
    <div class="container">
        <div class="row justify-content-center ptb-50" style="background: linear-gradient(50.48deg, #5bc7bf -2.06%, #d55967 93.55%);">
            <div class="col-md-8">
                <div class="video-promo-content mt-4 text-center">
                    <h4 class="mt-4 text-white">Looking for Home Care Services?</h4>
                   <p class="text-white">Compassionate, comprehensive home care for improved quality of life</p>
                    <div class="download-btn mt-5">
                        <a href="{{ url('home-Care-Solutions') }}" class="btn google-play-btn mr-3"> Visit Home Care Solutions</a>
                        <a href="{{ url('home-health-Solutions') }}" class="btn app-store-btn"> Visit Home Health Solutions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection