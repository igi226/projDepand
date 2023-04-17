



@extends('User.Master.mainLayout')

@section('title', 'View-Blog | Dependable Staffing Agency')

@section('content')

    <!--hero section start-->

    <section class="hero-section hero-section-3 pt-50 hero-container pb-3">

        <!--animated circle shape start-->

    

        <!--animated circle shape end-->

        <div class="container">

            <div class="row align-items-center justify-content-between">

                <div class="col-md-12 col-lg-12 text-center">

                    <div class="top-heading ptb-100">

                        <h2 class="font-weight-bold top-heading"> Blog Details</h2>

                        <p class="lead">Providing the highest quality

                              and professional services since 1989. </p>

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

                                    <li>In <a href="#">Branding</a>, <a href="#">Design</a></li>

                                    <li><a href="#">{{ $blog->comments->count() }} Comments</a></li>

                                </ul>

                            </div>

                            <div class="post-content">

                                <?php echo html_entity_decode($blog->description);?>

                            </div>

                        </div>

                    </article>

                    <!-- Post end-->



                    <!-- Comments area-->

                    <div class="comments-area mb-5">

                        <h5 class="comments-title">{{ $blog->comments->count() }} Comments</h5>

                        <div class="comment-list">

                            <!-- Comment-->

                            @foreach ($blog->comments as $comment)

                                

                            <div class="comment">

                                <div class="comment-author">

                                    @if (isset($comment->user->image) && !empty($comment->user->image) && File::exists(public_path("storage/UserImage/" . $comment->user->image)))

                                    <img class="avatar img-fluid rounded-circle" src="{{ asset('storage/UserImage/'. $comment->user->image) }}" alt="comment">

                                    @else

                                    <img src="{{asset('noimg.png')}}" alt="no-image" class="card-img-top position-relative">

                                @endif 

                                </div>

                                <div class="comment-body">

                                    <div class="comment-meta">

                                        <div class="comment-meta-author"><a href="#">{{  $comment->user->name }}</a></div>

                                        <div class="comment-meta-date"><a href="#">{{  Carbon\Carbon::parse($comment->created_at)->format('D, d M Y H:i') }}</a></div>

                                    </div>

                                    <div class="comment-content">

                                        <p>{{ $comment->comment }}</p>

                                    </div>

                                    @guest

                                    <div class="comment-reply">

                                         <a href="{{ route('login') }}">Please Login to Reply</a> 

                                    </div>

                                     @else  

                                     <div class="comment-reply">

                                        <button type="button" style="background: #202877;

                                        color: #fff;" class="comment-reply" onclick="myFunction({{ $comment->id }})">Reply</button>

                                    </div> 

                                    @endguest

                                   

                                </div>

                                <!-- Subcomment-->

                                @foreach ($comment->parentComments as $item)

                                    

                              

                                <div class="children">

                                    <div class="comment">

                                        <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="img/client-3.jpg" alt="comment"></div>

                                        <div class="comment-body">

                                            <div class="comment-meta">

                                                <div class="comment-meta-author"><a href="#">{{ $item->user->name }}</a></div>

                                                <div class="comment-meta-date"><a href="#">{{  Carbon\Carbon::parse($item->created_at)->format('D, d M Y H:i') }}</a></div>

                                            </div>

                                            <div class="comment-content">

                                                <p>{{ $item->reply }}</p>

                                            </div>

                                            {{-- @guest

                                            <div class="comment-reply">

                                                <a href="{{ route('login') }}">Please Login to Reply</a> 

                                            </div>

                                     @else  

                                     <div class="comment-reply"><a href="#">Reply</a></div> 

                                    @endguest --}}

                                        </div>

                                    </div>

                                </div>

                                @endforeach

                                {{-- parent reply form --}}

                                <div id="reply_{{ $comment->id }}" class="form-group col-md-4" style="display: none;">

                                    <form action="{{ route('parent.reply',$comment->id) }}" method="post">

                                        @csrf

                                        <input class="form-control" type="text" placeholder="Comment Something" name="reply" value="{{ '@'.$comment->user->name }}">

                                       

                                      

                                       

                                        <br>



                                        <button class="btn solid-btn btn-sm" type="submit">Reply to {{ $comment->user->name }}</button>

                                    </form>

                                </div>

                            </div>

                            @endforeach



                            <!-- Comment-->

                            {{-- <div class="comment">

                                <div class="comment-author"><img class="avatar img-fluid rounded-circle" src="img/client-4.jpg" alt="comment"></div>

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

                            </div> --}}

                        </div>

                        @guest

                        <div class="btn btn-default">

                            <a href="{{ route('login') }}">Please Login to comment</a> 

                        </div> 

                        @else

                        <div class="comment-respond">

                            <h5 class="comment-reply-title">Leave a Reply</h5>

                            <p class="comment-notes">Your email address will not be published. Required fields are marked</p>

                            <form action="{{ url('post-comment', $blog->id) }}" method="POST" class="comment-form row">

                                @csrf

                                {{-- <div class="form-group col-md-4">

                                    <input class="form-control" type="text" placeholder="Name">

                                </div> --}}

                                <div class="form-group col-md-4">

                                    <input class="form-control" type="text" placeholder="Email" name="email">

                                </div>

                                <div class="form-group col-md-4">

                                    <input class="form-control" type="url" placeholder="Website" name="website">

                                </div>

                                <div class="form-group col-md-12">

                                    <textarea class="form-control" rows="8" placeholder="Comment" name="comment"></textarea>

                                    @if ($errors->has('comment'))

                                        <span class="text-danger">{{ $errors->first('comment') }}</span>

                                      

                                    @endif

                                </div>

                                <div class="form-submit col-md-12">

                                    <button class="btn solid-btn" type="submit">Post Comment</button>

                                </div>

                            </form>

                        </div>

                        @endguest

                    </div>

                    <!-- Comments area end-->

                </div>

              

            </div>

        </div>

    </div>

@endsection

@include('Admin.sweetAlertMsg')