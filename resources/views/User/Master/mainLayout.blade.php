<?php 

   use App\Models\SiteInfo;

   

   $site_info = SiteInfo::first();



   

   ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--title-->
    <title>@yield('title')</title>

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('storage/SiteImages/'. $site_info->favicon_image) }}" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/bootstrap.min.css') }}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/magnific-popup.css') }}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/themify-icons.css') }}">
    <!--animated css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/animate.min.css') }}">

    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('userAsset/css/owl.theme.default.min.css') }}">
    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('userAsset/css/responsive.css') }}">
    <link href="{{ asset('adminAsset/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}

</head>

<body>

    @include('User.Master.header')

    <!--body content wrap start-->
    <div class="main">

       @yield('content')

 
        @include('User.Master.footer')

        <script src="{{ asset('userAsset/js/jquery-3.5.0.min.js') }}"></script>
        <!--Popper js-->
        <script src="{{ asset('userAsset/js/popper.min.js') }}"></script>
        <!--Bootstrap js-->
        <script src="{{ asset('userAsset/js/bootstrap.min.js') }}"></script>
        <!--Magnific popup js-->
        <script src="{{ asset('userAsset/js/jquery.magnific-popup.min.js') }}"></script>
        <!--jquery easing js-->
        <script src="{{ asset('userAsset/js/jquery.easing.min.js') }}"></script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        <!--wow js-->
        <script src="{{ asset('userAsset/js/wow.min.js') }}"></script>
        <!--owl carousel js-->
        <script src="{{ asset('userAsset/js/owl.carousel.min.js') }}"></script>
        <!--countdown js-->
        <script src="{{ asset('userAsset/js/jquery.countdown.min.js') }}"></script>
        <!--validator js-->
        <script src="{{ asset('userAsset/js/validator.min.js') }}"></script>
        <!--custom js-->
        <script src="{{ asset('userAsset/js/scripts.js') }}"></script>
        <script src="{{ asset('adminAsset/js/lib/sweetalert/sweetalert.min.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
        <script src="{{ asset('adminAsset/js/lib/sweetalert/sweetalert.init.js') }}"></script>
        <script>
            $('#summernote').summernote({
              placeholder: 'Enter Text here.........',
              tabsize: 2,
              height: 300,
              
            });
        </script>
        @yield('sweet_alrt_msg')
        <script>
            $('#aks').hover(
                    function() {
                        $(this).attr('src', '../img/vacancy-hover.png')
                            },
                            function() {
                                $(this).attr('src', '../img/vacancy-hover.png')
                            }
                    )
        </script>
        <script>
           
        function myFunction(c_id){
            //alert(c_id);
            if(document.getElementById("reply_"+c_id).style.display  == "none"){
                document.getElementById("reply_"+c_id). style.display = "block";
            }else{
                document.getElementById("reply_"+c_id). style.display = "none";

            }
         

        }
      </script>
      @yield('addmore')
      @yield('addmoreCom')
      @yield('updateCompany')
      @yield('search')
      @yield('updateAcademic')
      @yield('deleteAcademic')
      @yield('deleteJob')
      @yield('applicantstatus')
      @yield('getmsg')
      @yield('sendMsg')
      @yield('getApplicantByJob')
      @yield('selectall')
      @yield('addToFavorite')
      @yield('searchChatUser')
      @yield('image')
      @yield('deleteNotification')
      @yield('openPackages')
      <!--jQuery-->
      @yield('scroll')
      {{-- @yield('deleteNotification') --}}
      @yield('getByInduatry')
      <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            //alert(form);
            event.preventDefault();
            swal({
                   title: "Delete?",
                   text: "Please ensure and then confirm!",
                   type: "warning",
                   showCancelButton: !0,
                   confirmButtonText: "Yes, delete it!",
                   cancelButtonText: "No, cancel!",
                   reverseButtons: !0
               }) function(willDelete) {
                if (willDelete.value) {
                        form.submit();
                    } else {
                        swal("Your data file is safe!");
                    }
               }
              
                // .then((willDelete) => {
                //  if (willDelete.value) {
                //         form.submit();
                //     } else {
                //         swal("Your data file is safe!");
                //     }
                //  });
        });
    </script>
</body>

</html>
