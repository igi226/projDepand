@extends('Admin.Main.masterLayout')

@section('title', 'Site Info | Defendable Stuffing Agency')

@section('content')





    <div class="row">
<div class="col-lg-3"></div>
      <div class="col-lg-6">

        <div class="card">

            <form action="{{ url('admin/admin-profile') }}" method="post" enctype="multipart/form-data">

                @csrf

               

          <div class="card-body">

            <div class="user-profile">

               

              <div class="row">

                {{-- <div class="col-lg-4">

                  <div class="user-photo m-b-30">

                    <img class="img-fluid" src="{{ asset('storage/Admin/'. $admin_info->admin_image) }}" alt="" />

                  </div>

                  <div class="m-b-30">

                    <label for="image">Upload New</label>

                    <input type="file" name="admin_image" id="">

                  </div>

                 

                </div> --}}

                <div class="col-lg-12">

                   

                 

                  

                  <div class="">

                    

                    <div>

                      <div>

                        <div class="">

                            <span class="contact-title">Name:</span>

                            <input type="text" name="admin_name" placeholder="John Doe" class="form-control" value="{{ $admin_info->admin_name }}"><br>

                          

                          

                          

                          <div class="">

                            <span class="contact-title">Email:</span>

                            

                            <input type="email" name="admin_email" placeholder="hello@Admin Board.com" class="form-control" value="{{ $admin_info->admin_email }}">

                          </div>

                          

                        </div>

                      

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>
<br>
          <div class="text-center">



          <button type="submit" class="btn btn-default btn-rounded m-b-10 btn-sm">Update</button>

        </form>

        </div>



        </div>

      </div>

    </div>

    

@endsection

@include('Admin.sweetAlertMsg')