@extends('User.Master.mainLayout')

@section('title', 'Blog | Dependable Staffing Agency')

@section('content')



<!--hero section start-->

<section class="hero-section hero-section-3 pt-50 hero-container pb-3">

    <!--animated circle shape start-->



    <!--animated circle shape end-->

    <div class="container">

        <div class="row align-items-center justify-content-between">

            <div class="col-md-12 col-lg-12 text-center">

                <div class="top-heading ptb-100">

                    <h2 class="font-weight-bold top-heading">Our Blogs</h2>

                    <p class="lead">Providing the highest quality

                          and professional services since 1989. </p>

                </div>

            </div>

        

        

        </div>

    </div>



    

    <!--shape image end-->

</section>





<section class="our-blog-section ptb-100 ">

    <div class="container">

    

        <div class="row">

            @foreach ($blogs as $blog)

                

            

            <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm" style="height: 90%">

                    @if (isset($blog->image) && !empty($blog->image) && File::exists(public_path("storage/BlogImage/" . $blog->image)))

                    <img src="{{ asset('storage/BlogImage/'.$blog->image)}}" class="card-img-top position-relative" alt="blog">



                        @else

                            <img src="{{asset('noimg.png')}}" alt="no-image" class="card-img-top position-relative">

                        @endif  

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">{{  Carbon\Carbon::parse($blog->created_at)->format('D, d M Y H:i') }}</li>

                                {{-- <li class="list-inline-item"><span>45</span> Comments</li>

                                <li class="list-inline-item"><span>10</span> Share</li> --}}

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="{{ url('view-blog',$blog->slug) }}">{{ $blog->title }}</a></h3>

                        <p class="card-text">{{implode(' ', array_slice(str_word_count(htmlspecialchars(trim(strip_tags($blog->description))),2),0,10))}}</p>

                        <a href="{{ url('view-blog',$blog->slug) }}" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            @endforeach

            <span>

                

            </span>

            {{-- <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm">

                    <img src="{{ asset('userAsset/img/blog/2.jpg') }}" class="card-img-top position-relative" alt="blog">

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">May 26, 2019</li>

                                <li class="list-inline-item"><span>30</span> Comments</li>

                                <li class="list-inline-item"><span>5</span> Share</li>

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="#">Quickly formulate backend</a></h3>

                        <p class="card-text">Synergistically engage effective ROI after customer directed partnerships.</p>

                        <a href="#" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm">

                    <img src="{{ asset('userAsset/img/blog/3.jpg') }}" class="card-img-top" alt="blog">

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">Apr 25, 2019</li>

                                <li class="list-inline-item"><span>41</span> Comments</li>

                                <li class="list-inline-item"><span>30</span> Share</li>

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="#">Objectively extend extensive</a></h3>

                        <p class="card-text">Holisticly mesh open-source leadership rather than proactive users. </p>

                        <a href="#" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm">

                    <img src="{{ asset('userAsset/img/blog/4.jpg') }}" class="card-img-top position-relative" alt="blog">

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">Jan 21, 2019</li>

                                <li class="list-inline-item"><span>45</span> Comments</li>

                                <li class="list-inline-item"><span>10</span> Share</li>

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="#">Appropriately re-engineer high </a></h3>

                        <p class="card-text">Some quick example text to build on the card title and make up the bulk.</p>

                        <a href="#" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm">

                    <img src="{{ asset('userAsset/img/blog/5.jpg') }}" class="card-img-top position-relative" alt="blog">

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">May 26, 2019</li>

                                <li class="list-inline-item"><span>30</span> Comments</li>

                                <li class="list-inline-item"><span>5</span> Share</li>

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="#">Progressively visualize enabled</a></h3>

                        <p class="card-text">Synergistically engage effective ROI after customer directed partnerships.</p>

                        <a href="#" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="single-blog-card card border-0 shadow-sm">

                    <img src="{{ asset('userAsset/img/blog/6.jpg') }}" class="card-img-top" alt="blog">

                    <div class="card-body">

                        <div class="post-meta mb-2">

                            <ul class="list-inline meta-list">

                                <li class="list-inline-item">Apr 25, 2019</li>

                                <li class="list-inline-item"><span>41</span> Comments</li>

                                <li class="list-inline-item"><span>30</span> Share</li>

                            </ul>

                        </div>

                        <h3 class="h5 card-title"><a href="#">Credibly implement users</a></h3>

                        <p class="card-text">Holisticly mesh open-source leadership rather than proactive users. </p>

                        <a href="#" class="detail-link">Read more <span class="ti-arrow-right"></span></a>

                    </div>

                </div>

            </div> --}}

        </div>



        <!--pagination start-->

        <div class="row">

            <div class="col-md-12">

                <nav class="custom-pagination-nav mt-4">

                    <ul class="pagination justify-content-center">

                        {{-- <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-left"></span></a></li>

                        <li class="page-item active"><a class="page-link" href="#">1</a></li>

                        <li class="page-item"><a class="page-link" href="#">2</a></li>

                        <li class="page-item"><a class="page-link" href="#">3</a></li>

                        <li class="page-item"><a class="page-link" href="#">4</a></li>

                        <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li> --}}

                        {{ $blogs->links() }}

                    </ul>

                </nav>

            </div>

        </div>

        <!--pagination end-->



    </div>

</section>

    

@endsection