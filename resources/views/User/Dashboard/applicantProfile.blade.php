@extends('User.Dashboard.main')
@section('contentt')
    <div class="panel-body">
      

            <div class="my-profile-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="myprofile-area">
                            @if (isset($applicantProfile->image) &&
                                !empty($applicantProfile->image) &&
                                File::exists(public_path('storage/image/' . $applicantProfile->image)))
                                <img height="80" width="100" src="{{ asset('storage/image/' . $applicantProfile->image) }}"
                                    alt="no-p_image" class="img-fluid">
                            @else
                                <img src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4">
                        <div class="myprofile-video">
                            @if (isset($applicantProfile->video) &&
                                !empty($applicantProfile->video) &&
                                File::exists(public_path('storage/Video/' . $applicantProfile->video)))
                                <video height="240" controls>
                                    <source src="{{ asset('storage/Video/' . $applicantProfile->video) }}" type="video/mp4">
                                </video>
                            @else
                                <img height="240" src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
                
                

            </div>
            <div class="account-pnl mt-3">
                @csrf
                <div class="row">
                    <div class="col-lg-12 ">
                        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"> <b> Info</b></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for=""> name</label>
                                <p>{{ $applicantProfile->name }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Email</label>
                                <p>{{ $applicantProfile->email }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Phone Number</label>
                                {{ $applicantProfile->phone }}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Address</label>
                                {{ $applicantProfile->address }}
                            </div>
                        </div>
                    </div>
                   
                    <hr>
                    
                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <label for="">Introduction</label>

                        <div class="myprofile-video">
                            @if (isset($applicantProfile->video) &&
                                !empty($applicantProfile->video) &&
                                File::exists(public_path('storage/Video/' . $applicantProfile->video)))
                                <video height="240" controls>
                                    <source src="{{ asset('storage/Video/' . $applicantProfile->video) }}" type="video/mp4">
                                </video>
                            @else
                                <img height="240" src="{{ asset('noimg.png') }}" alt="no-p_image" class="img-fluid">
                            @endif
                        </div>
                    </div> --}}

                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="">Facebook</label>
                        <p><a href="{{ $applicantProfile->facebook }}" target="_blank" rel="noopener noreferrer">Visit</a></p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="">Twitter</label>
                        
                        <p><a href="{{ $applicantProfile->twitter }}" target="_blank" rel="noopener noreferrer">Visit</a></p>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="">Github</label>
                       
                        <p><a href="{{ $applicantProfile->github }}" target="_blank" rel="noopener noreferrer">Visit</a></p>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="">Dribble</label>
                       
                        <p><a href="{{ $applicantProfile->dribble }}" target="_blank" rel="noopener noreferrer">Visit</a></p>

                    </div>
<hr>
                    

                    <div class="col-lg-12 ">
                        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Academic Info</b></span>
                    </div>
                    <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info">

                        
                            @foreach ($applicantProfile->academicsInfos as $item)
                                {{-- <div class="form-group row w-100 ml-1 align-items-center" id="acamedic_info"> --}}
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label for="">Degree</label>
                                   <p>{{ $item->degree }}</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <label for="">School/University</label>
                                    <p>{{ $item->school }}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <label for="">Passing Year</label>
                                    <p>{{ $item->passing_year }}</p>
                                </div>
                                
                            @endforeach
                        
                    </div>
                    

                        
                    

                    
                    <div class="col-lg-12 ">
                        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"><b>Career Info</b></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="">Bio</label>
                        <p>{{ $applicantProfile->biography }}</p>
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Experience</label>
                        <p>{{ $applicantProfile->experience }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Skills</label>
                        <p>{{ $applicantProfile->skills }}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Git</label>
                        <a href="{{ $applicantProfile->github_link }}" target="_blank" rel="noopener noreferrer">Visit</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="">Linkdin</label>
                        
                        <a href="{{ $applicantProfile->linkdin_link }}" target="_blank" rel="noopener noreferrer">Visit</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Resume</label>
                        <a class="btn btn-primary text-white btn-xs" href="{{ asset('storage/Resume/'.$applicantProfile->resume) }}" target="_blank" rel="noopener noreferrer">{{ " Download" }}</a>

                    </div>
                    
                </div>
       
    </div>
    </div>
@endsection
@section('addmore')
    <script>
        var i = 0;
        $("#add-product").click(function() {
            //  
            ++i;
            $("#acamedic_info").append(
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label for="">Degree</label>' +
                '<input type="text" name="addMoreInputFields[' + i + '][degree]" placeholder="degree">' +
                '</div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><label for="">School/University</label>' +
                '<input type="text" name="addMoreInputFields[' + i + '][school]" placeholder="school">' +
                '</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><label for="">Passing Year</label>' +
                '<input type="text" name="addMoreInputFields[' + i +
                '][passing_year]" placeholder="passing year">');
        });
    </script>
@endsection
@section('addmoreCom')
    <script>
        var i = 0;
        $("#add-company").click(function() {
        
            ++i;
            $("#company_info").append(
                '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label for="">Company Name</label>' +
                '<input type="text" name="addMoreCompaly[' + i + '][company_name]" placeholder="company_name">' +
                '</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label for="">Position</label>' +
                '<input type="text" name="addMoreCompaly[' + i +
                '][position]" placeholder="passing year"></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><label for="">Join Date</label>' +
                '<input type="text" name="addMoreCompaly[' + i + '][join_date]" placeholder="join_date">' +
                '</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><label for="">Leave Date</label>' +
                '<input type="text" name="addMoreCompaly[' + i +'][leave_date]" placeholder="passing year"></div>');
        });
    </script>
@endsection
@section('updateAcademic')
    <script>
        $(document).on('click', '.editItem', function() {
            var data_id = $(this).attr('data-id');
            var degree = document.getElementById("degree" + data_id).value;
            var school = document.getElementById("school" + data_id).value;
            var passing_year = document.getElementById("passing_year" + data_id).value;
            //  alert(passing_year);
            $.ajax({

                type: "get",
                url: "{{ url('update-academic-info') }}",
                data: {
                    'degree': degree,
                    'school': school,
                    'passing_year': passing_year,
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            window.location
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection
@section('deleteAcademic')
    <script>
        $(document).on('click', '.removeItem', function() {
            var data_id = $(this).attr('data-id');
            $.ajax({

                type: "post",
                url: "{{ url('delete-academic-info') }}",
                data: {
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection

@section('updateCompany')
    <script>
        $(document).on('click', '.editCompany', function() {
            var data_id = $(this).attr('data-id');
            var company_name = document.getElementById("company_name" + data_id).value;
            var join_date = document.getElementById("join_date" + data_id).value;
            var leave_date = document.getElementById("leave_date" + data_id).value;
            var position = document.getElementById("position" + data_id).value;
            //  alert(passing_year);
            $.ajax({

                type: "get",
                url: "{{ url('update-Company-info') }}",
                data: {
                    'company_name': company_name,
                    'join_date': join_date,
                    'leave_date': leave_date,
                    'position': position,
                    'id': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            window.location
                        });
                    }, 1000);
                }
            });

        });
    </script>
@endsection
{{-- @section('image')


<script>
    $(document).on('change', '#myFile', function() {
        alert("image.name");
//         var image = document.getElementById("myFile").files[0];
// alert(image.name);
    //    $.ajax({

    //        type: "POST",
    //        url: "{{ route('uploadImage') }}",
    //        data: {
    //            'image': image,
    //            '_token': '{{ csrf_token() }}'
    //        },
    //        dataType: "JSON",
    //        success: function(response) {
    //            setTimeout(function() {
    //                swal({
    //                    title: "Success!",
    //                    text: response.msg,
    //                    type: "success"
    //                }, function() {
    //                    location.reload();
    //                });
    //            }, 1000);
    //        }
    //    });

   });
</script>
    
@endsection --}}
@include('Admin.sweetAlertMsg')
