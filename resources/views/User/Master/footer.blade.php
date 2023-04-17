       <!--footer section start-->
       <footer class="footer-section">

        <!--footer top start-->
        <div class="footer-top pt-20 background-img-2">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12 col-lg-3 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            {{-- <img src="{{ asset('userAsset/img/logo - Copy.png') }}" alt="footer logo"
                                width="200" class="img-fluid mb-3"> --}}
                <img src="{{ asset('depenlogo - Copy.png') }}" alt="footer logo"
                width="200" class="img-fluid mb-3">


                        </div>
                        <div class="bblogo">
                            <img src="{{ asset('userAsset/img/bbb-logo.png') }}" width="110">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="row">
                            <div class="col-lg-7 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <div class="footer-nav-wrap text-white">
                                    <h5 class="mb-3 text-white">Quick Links</h5>
                                    <ul class="list-unstyled footernav">
                                        <li class="mb-2"><a href="{{ url('about-us') }}">About Us</a></li>
                                        <li class="mb-2"><a href="{{ url('blog') }}">Blogs</a></li>
                                        <li class="mb-2"><a href="#">Contact Us</a></li>
                                        <li class="mb-2"><a
                                                href="{{ url('all-jobs') }}">Apply</a>
                                        </li>
                                        <li class="mb-2"><a href="{{ url('client') }}">Clients</a></li>
                                        <li class="mb-2"><a href="{{ url('facilities') }}">Facilities</a></li>
                                        {{-- <li class="mb-2"><a href="https://dependablestaffingagency.bamboohr.com/jobs/">Submit Resume</a></li> --}}
                                        <li class="mb-2"><a href="{{ url('post-a-job') }}">Post a Job</a></li>
                                        <li class="mb-2"><a href="{{ url('job') }}">Job</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class=" col-lg-5 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                                <div class="footer-nav-wrap text-white">
                                    <h5 class="mb-3 text-white">Subscribe Us</h5>
                                    <form action="#" method="POST" id="contactForm" class="contact-us-form"
                                        novalidate="true">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="  font-size: 12px;">Sign Up To Our Newsletter To
                                                        Get The Latest News And Offers. </label><br>
                                                    <div class="position-relative d-flex newsletterform">
                                                        <div class="flex-fill">
                                                            <input type="text" class="form-control"
                                                                name="name" id="name" required="required"
                                                                placeholder="Enter your email">
                                                        </div>
                                                        <button class="btn newsletter-btn">Subscribe</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <h5 class="mb-3 text-white mt-2">Social Share</h5>
                                    <div class="social-list-wrap">
                                        <a href="{{ $site_info->facebook }}" target="_blank" title="Facebook" class="facebook">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>

                                        <a href="{{ $site_info->twitter }}" target="_blank" title="Twitter" class="twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="{{ $site_info->instagram }}" target="_blank" title="Instagram" class="instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                        <a href="#" target="_blank" title="linkdin" class="linkdin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <a href="{{ $site_info->youtube }}" target="_blank" title="youtube" class="youtube">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light mt-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-7">
                            <div class="copyright-wrap small-text">
                                <p class="mb-0 text-black">©Copyright <script> document.write(new Date().getFullYear()) </script> <a href=""
                                        class="red-title"><a href="{{ url('/') }}">{{ $site_info->site_name }}</a> All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="terms-policy-wrap text-lg-right text-md-right text-left">
                                <p class="mb-0 text-black">Designed By <a href="https://www.goigi.com/" class="red-title">
                                        GOIGI</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <!--footer section end-->