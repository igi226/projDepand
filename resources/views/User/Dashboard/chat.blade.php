@extends('User.Dashboard.main')

@section('contentt')
    <div class="panel-body p-0">

        <div class="row">
            <div class="col-lg-4 col-md-5 pr-lg-0">
                <div class="chatleft-pnl h-100">
                    <h2 class="h4 text-white">Chats</h2>
                    <div class="search-chat px-0">
                        <input id="searchbar" onkeyup="search_animal()" type="text" name="search"
                            placeholder="Search user..">
                        <span><i class="fa fa-search"></i></span>
                    </div>
                    <div class="chat-recent">
                        <h3 class="px-0 h4 text-white">Recent</h3>
                        <div class="scroll-recent">
                            @foreach ($chat_users as $item)
                                @php
                                    if (auth()->user()->user_type == 'Employer') {
                                        $to_user_id = $item['user_id'];
                                    } else {
                                        $to_user_id = $item['employer_id'];
                                    }
                                @endphp

                                <div class="recent-body px-0 py-2" onclick="getMsg({{ $to_user_id }})">
                                    <div class="recent-profile align-items-center">
                                        <div class="recent-image">
                                            @php
                                                $user_image = DB::table('users')->where('id', $to_user_id)->select('image')->first();
                                            @endphp
                                            @if (isset($user_image->image) && !empty($user_image->image) &&
                                                File::exists(public_path('storage/image/' . $user_image->image)))
                                                <img height="80" width="100" src="{{ asset('storage/image/' . $user_image->image->image) }}"
                                                    alt="no-p_image" class="img-fluid">
                                            @else
                                            {{-- <img height="80" width="100" src="" alt="no-p_image" class="img-fluid"> --}}
                                            <img height="80" width="100" src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">

                                            @endif
                                            


                                            @if (DB::table('users')->where('id', $to_user_id)->value('online') == 1)
                                                <span class="dot-circle-profile"></span>
                                            @endif

                                        </div>
                                        <div class="recent-profile-content">
                                            <h6>{{ auth()->user()->user_type == 'Employer'? DB::table('users')->where('id', $item['user_id'])->value('name'): DB::table('users')->where('id', $item['employer_id'])->value('name') }}
                                            </h6>
                                            
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            @php
                            // if (auth()->user()->user_type == 'Employer') {
                            //     $to_user_id2 = $chat_users['user_id'];
                            // } else {
                            //     $to_user_id = $item['employer_id'];
                            // }
                                $users = DB::table('users')->get();
                                    // ->whereNotIn('id', [$chat_users->id])
                                    
                            @endphp
                            @foreach ($users as $user)
                                <div class="recent-body px-0 py-2" onclick="getMsg({{ $user->id }})">
                                    <div class="recent-profile align-items-center">
                                        <div class="recent-image">
                                            @if (isset($user->image) && !empty($user->image) &&
                                                File::exists(public_path('storage/image/' . $user->image)))
                                                <img height="80" width="100" src="{{ asset('storage/image/' . $user->image) }}"
                                                    alt="no-p_image" class="img-fluid">
                                            @else
                                            <img height="80" width="100" src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                                            @endif


                                            @if (DB::table('users')->where('id', $user->id)->value('online') == 1)
                                                <span class="dot-circle-profile"></span>
                                            @endif

                                        </div>
                                        <div class="recent-profile-content">
                                            <h6>{{ auth()->user()->user_type == 'Employer'? DB::table('users')->where('id', $user->id)->value('name'): DB::table('users')->where('id', $user->id)->value('name') }}
                                            </h6>
                                            {{-- <p>Okay</p> --}}
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="col-lg-8 col-md-7 pl-lg-0" id="hello">
                <div class="chat-main-body shadow-none">

                    <div class="main-body-n">
                        <div class="text-center mt-5">
                            <h2 class="h4">Hi.. {{ auth()->user()->name }} <br>Start Your chat</h2>
                        </div>
                    </div>

                </div>
            </div>
            {{--  --}}
            <div class="col-lg-8 col-md-8 pl-lg-0" id="chats">
            </div>


        </div>
    </div>
@endsection

@section('getmsg')
    <script>
        function getMsg(user_id) {
            $.ajax({

                url: "{{ url('getmsg') }}" + "/" + user_id,
                type: "GET",
                data: {
                    '_token': '{{ csrf_token() }}'
                },

                dataType: "HTML",
                success: function(data) {

                    console.log(data);
                    $('#hello').hide();
                    $('#chats').html(data).removeClass("d-none").show();
                    // $( "#main-body" ).load(window.location.href + " #main-body" );

                    var iScrollHeight = $("#chats").find(".main-body")[0].scrollHeight;
                    $('.main-body').animate({
                        scrollTop: iScrollHeight
                    }, 0);
                },
                error: function(error) {
                    console.log(`Error ${error}`);
                }
            });
        }
        getMsg();
    </script>
@endsection
@section('searchChatUser')
    <script>
        function search_animal() {
            let input = document.getElementById('searchbar').value
            input = input.toLowerCase();
            let x = document.getElementsByClassName('recent-body');

            for (i = 0; i < x.length; i++) {
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display = "none";
                } else {
                    x[i].style.display = "list-item";
                }
            }
        }
    </script>
@endsection
@section('sendMsg')
    <script>
        function sendMsg(from_user_id, to_user_id) {
            var chat = document.getElementById("chat").value;

            function ajaxCall() {
                $.ajax({

                    url: "{{ route('sendMsg') }}",
                    type: "POST",
                    data: {
                        'from_user_id': from_user_id,
                        'to_user_id': to_user_id,
                        'chat': chat,
                        '_token': '{{ csrf_token() }}'
                    },

                    dataType: "JSON",
                    success: function(data) {

                        console.log(data);
                        // window.setInterval(function(){
                        getMsg(to_user_id);

                        // }, 1000);
                        setInterval("my_function();", 1000);
                        // function my_function(){
                        // $('#main-body').load('{{ route('chat') }} #main-body');
                        //  }


                    },
                    error: function(error) {
                        console.log(`Error ${error}`);
                    }
                });
            }
            ajaxCall();
        }
    </script>
@endsection
