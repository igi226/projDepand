@extends('Admin.Main.masterLayout')

@section('title', 'Site Info | Defendable Stuffing Agency')

@section('content')

<div class="row">

    <div class="col-lg-10 align-center">

        <div class="card">

            <div class="card-title">

                

                

                <h4>Site Information</h4>


                

            </div>

            <div class="card-body">

                <div class="basic-form">

                    <form method="POST" action="{{ url('admin/site-informations') }}" style="width: 43rem;" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label>Site Name:</label>

                            <input type="text" class="form-control" placeholder="Site name" name="site_name" value="{{ $siteInfos->site_name }}">

                            @if ($errors->has('site_name'))

                            <span class="text-danger">{{ $errors->first('site_name') }}</span>

                            @endif

                        </div>

                        <div class="form-group">

                            <label>Address:</label>

                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $siteInfos->address }}">

                        </div>



                        <div class="form-group">

                            <label>Site Email:</label>

                            <input type="email" class="form-control" placeholder="email" name="email" value="{{ $siteInfos->email }}">

                            @if ($errors->has('email'))

                            <span class="text-danger">{{ $errors->first('email') }}</span>

                            @endif

                        </div>

                        <div class="form-group">

                            <label>Phone:</label>

                            <input type="number" class="form-control" placeholder="+1234567890" name="phone" value="{{ $siteInfos->phone }}">

                        </div>

                        <div class="form-group">

                            <label>Current Logo Image:</label>

                            @if (isset($siteInfos->logo_image) && !empty($siteInfos->logo_image) && File::exists(public_path("storage/SiteImages/" . $siteInfos->logo_image))) 



                               <img height="50" width="150" src="{{ asset('storage/SiteImages/'. $siteInfos->logo_image) }}" alt=""><br><br>

    

                            @else



                                <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image">    



                            @endif

                        </div>

                        <div class="form-group">

                            <label>Logo Image:</label>

                            <input name="logo_image" class="form-control font-weight-light text-muted" type="file" id="example-text-input">

                            

                        </div>

                        <div class="form-group">

                            <label>Current Favicon Image:</label>

                            @if (isset($siteInfos->favicon_image) && !empty($siteInfos->favicon_image))



                                <img height="50" width="150" src="{{ asset('storage/SiteImages/'. $siteInfos->favicon_image) }}" alt=""><br><br>

    

                            @else



                            <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image">    



                            @endif

                        </div>



                        <div class="form-group">

                            <label>Favicon Image:</label>

                            <input  name="favicon_image" class="form-control font-weight-light text-muted" type="file" >

                         

                            

                        </div>

                        </div>

                        <div class="form-group">

                            <label>Twitter:</label>

                            <input type="text" class="form-control" placeholder="https://twitter.com/" name="twitter" value="{{ $siteInfos->twitter }}">

                        </div>

                        <div class="form-group">

                            <label>Facebook:</label>

                            <input type="text" class="form-control" placeholder="https://www.facebook.com/" name="facebook" value="{{ $siteInfos->facebook }}">

                        </div>

                        <div class="form-group">

                            <label>YouTube:</label>

                            <input type="text" class="form-control" placeholder="https://www.youtube.com/" name="youtube" value="{{ $siteInfos->youtube }}">

                        </div>

                        <div class="form-group">

                            <label>Instagram:</label>

                            <input type="text" class="form-control" placeholder="https://www.instagram.com/" name="instagram" value="{{ $siteInfos->instagram }}">

                        </div>

                       

                        <button type="submit" class="btn btn-default">Submit</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>

        function readURL(input) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#imageResult')

                .attr('src', e.target.result);

        };

        reader.readAsDataURL(input.files[0]);

    }

}



$(function () {

    $('#upload').on('change', function () {

        readURL(input);

    });

});



/*  ==========================================

    SHOW UPLOADED IMAGE NAME

* ========================================== */

var input = document.getElementById( 'upload' );

var infoArea = document.getElementById( 'upload-label' );



input.addEventListener( 'change', showFileName );

function showFileName( event ) {

  var input = event.srcElement;

  var fileName = input.files[0].name;

  infoArea.textContent = 'File name: ' + fileName;

}

    </script>



    {{--  --}}



 

@endsection



@section('sweet_alrt_msg')

{{-- <script>

    @if($msg = session('msg'))

    swal("{{ $msg }}");

    @endif

</script> --}}

@endsection
@include('Admin.sweetAlertMsg')
