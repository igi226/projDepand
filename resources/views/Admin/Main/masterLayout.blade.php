<?php 
   use App\Models\SiteInfo;
   use App\Models\Admin;
   $site_info = SiteInfo::first();
   $admin = Admin::first();
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- theme meta -->
      <meta name="theme-name" content="focus" />
      <title>@yield('title')</title>
      <!-- ================= Favicon ================== -->
      <!-- Standard -->
      <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
      <!-- Retina iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
      <!-- Retina iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
      <!-- Standard iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
      <!-- Standard iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
      {{-- favicon --}}
      <link rel="icon" type="image/x-icon" href="{{ asset('storage/SiteImages/'. $site_info->favicon_image) }}">

      <link href="{{ asset('adminAsset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/lib/themify-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('adminAsset/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('adminAsset/css/lib/weather-icons.css') }}" rel="stylesheet" />
      <link href="{{ asset('adminAsset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/lib/helper.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('adminAsset/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
      {{-- 2nov summernote --}}
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
      <style>
         [contenteditable]:hover, [contenteditable]:focus {
         background: #f8f9fe;
         }
      </style>
   </head>
   <body>
      @include('Admin.Main.sideNavbar')
      <!-- /# sidebar -->
      @include('Admin.Main.header')
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">
               <!-- /# row -->
               <section id="main-content">
                  @yield('content')
               </section>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="footer">
                        <p>
                           <script>
                              document.write(new Date().getFullYear())
                           </script> © {{ $site_info->site_name }}.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('adminAsset/js/lib/sweetalert/sweetalert.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/sweetalert/sweetalert.init.js') }}"></script>
      @yield('sweet_alrt_msg')
      <!-- jquery vendor -->
      <script src="{{ asset('adminAsset/js/lib/jquery.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/jquery.nanoscroller.min.js') }}"></script>
      <!-- nano scroller -->
      <script src="{{ asset('adminAsset/js/lib/menubar/sidebar.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/preloader/pace.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('adminAsset/js/lib/bootstrap.min.js') }}"></script>
      <!-- bootstrap -->
      {{-- <script src="{{ asset('adminAsset/js/lib/calendar-2/moment.latest.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/calendar-2/pignose.init.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/weather/weather-init.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/circle-progress/circle-progress.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/circle-progress/circle-progress-init.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/chartist/chartist.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/sparklinechart/sparkline.init.js') }}"></script> --}}
      <script src="{{ asset('adminAsset/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('adminAsset/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
      {{-- printpdf --}}
      {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
      <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> --}}
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

      @yield('printSection')
@yield('applicantstatus')
      <!-- scripit init-->
      <script src="{{ asset('adminAsset/js/dashboard2.js') }}"></script>
      {{-- datatable 31Oct 2022 --}}
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
      <script>
         $(document).ready(function () {
         $('#example').DataTable();
         });
         
      </script>
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
      <script>
         $('#summernote').summernote({
           placeholder: 'Enter Text here.........',
           tabsize: 2,
           height: 300,
           
         });
      </script>
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
      
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
         $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
      </script>
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
             })

              .then((willDelete) => {
               //  console.log(willDelete.value);
                  if (willDelete.value) {
                      form.submit();
                  } else {
                      swal("Your data file is safe!");
                  }
              });
      });
  </script>
     @yield('status')
     @yield('changePS')
     @yield('changeEmailV')
   </body>
</html>