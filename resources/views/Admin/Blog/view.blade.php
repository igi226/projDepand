@extends('Admin.Main.masterLayout')
@section('title', 'blogs | Defendable Stuffing Agency')
@section('content')


<!--hero section start-->
<section class="hero-section hero-section-3 pt-50 hero-container">
    <!--animated circle shape start-->

    <!--animated circle shape end-->
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-12 col-lg-12 text-center">
                <div class="top-heading ptb-100">
                    <h2 class="font-weight-bold top-heading"> Blog Details</h2>
                  
                </div>
            </div>
        
        
        </div>
    </div>

    
    <!--shape image end-->
</section>


<div class="module ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Post-->
                <article class="post">
                    <div class="post-preview">
                        
                        @if (isset($blog->image) && !empty($blog->image) && File::exists(public_path("storage/BlogImage/" . $blog->image)))
                            <img  src="{{ asset('storage/BlogImage/'.$blog->image)}}" alt="article" class="img-fluid">
                        @else
                            <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image" class="img-fluid">
                        @endif  
                    </div>
                    <div class="post-wrapper">
                        <div class="post-header">
                            <h1 class="post-title">{{ $blog->title }}</h1>
                            <ul class="post-meta">
                               
                                <li>{{  Carbon\Carbon::parse($blog->created_at)->format('D, d M Y H:i') }}</li>
                                {{-- <li>In <a href="#">Branding</a>, <a href="#">Design</a></li>
                                <li><a href="#">3 Comments</a></li> --}}
                            </ul>
                        </div>
                        <div class="post-content">
                        
                            <?php echo html_entity_decode($blog->description);?>
                        </div>
                       
                    </div>
                </article>
                <!-- Post end-->

                <!-- Comments area-->
                {{-- <div class="comments-area mb-5">
                    <h5 class="comments-title">3 Comments</h5>
                    <div class="comment-list">
                        <!-- Comment-->
                        <div class="comment">
                            <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="{{ asset('userAsset/img/client-2.jpg') }}" alt="comment"></div>
                            <div class="comment-body">
                                <div class="comment-meta">
                                    <div class="comment-meta-author"><a href="#">Jason Ford</a></div>
                                    <div class="comment-meta-date"><a href="#">May 5, 2015 at 4:51 am</a></div>
                                </div>
                                <div class="comment-content">
                                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Seitan High Life reprehenderit consectetur cupidatat kogi about me. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.</p>
                                </div>
                                <div class="comment-reply"><a href="#">Reply</a></div>
                            </div>
                            <!-- Subcomment-->
                            <div class="children">
                                <div class="comment">
                                    <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="{{ asset('userAsset/img/client-3.jpg') }}" alt="comment"></div>
                                    <div class="comment-body">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author"><a href="#">Harry Benson</a></div>
                                            <div class="comment-meta-date"><a href="#">May 5, 2015 at 4:51 am</a></div>
                                        </div>
                                        <div class="comment-content">
                                            <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Seitan High Life reprehenderit consectetur cupidatat kogi about me. Photo booth anim 8-bit hella.</p>
                                        </div>
                                        <div class="comment-reply"><a href="#">Reply</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment-->
                        <div class="comment">
                            <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="{{ asset('userAsset/img/client-4.jpg') }}" alt="comment"></div>
                            <div class="comment-body">
                                <div class="comment-meta">
                                    <div class="comment-meta-author"><a href="#">Henry Cain</a></div>
                                    <div class="comment-meta-date"><a href="#">May 5, 2015 at 4:51 am</a></div>
                                </div>
                                <div class="comment-content">
                                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Seitan High Life reprehenderit consectetur cupidatat kogi about me. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.</p>
                                </div>
                                <div class="comment-reply"><a href="#">Reply</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-respond">
                        <h5 class="comment-reply-title">Leave a Reply</h5>
                        <p class="comment-notes">Your email address will not be published. Required fields are marked</p>
                        <form class="comment-form row">
                            <div class="form-group col-md-4">
                                <input class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="url" placeholder="Website">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" rows="8" placeholder="Comment"></textarea>
                            </div>
                            <div class="form-submit col-md-12">
                                <button class="btn solid-btn" type="submit">Post Comment</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <!-- Comments area end-->
            </div>
          
        </div>
    </div>
</div>


@endsection