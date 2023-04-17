@extends('Admin.Main.masterLayout')

@section('title', 'CMS | Defendable Stuffing Agency')

@section('content')



    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <table id="example" class="table table-striped table-bordered" style="width:100%">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Title</th>

                            <th>Short Description</th>

                            <th>Description</th>





                            <th>Image</th>





                            <th>Action</th>





                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($data_s as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->title }}</td>

                                <td>{{ $item->short_desc }}</td>



                                <td>{{ implode(' ', array_slice(str_word_count(htmlspecialchars(trim(strip_tags($item->description))), 2), 0, 10)) }}

                                </td>






<td>
                               
                                @if (isset($item->image) && !empty($item->image) && File::exists(public_path("storage/CmsImage/" . $item->image)))

                                <img height="80" width="100" src="{{ asset('storage/CmsImage/'.$item->image)}}" alt="">

                                @else

                                <img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> 

                                @endif  

                                </td>



                                <td>

                                    <a href="{{ route('cms.edit', $item->slug) }}" class="text-primary"

                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i

                                            class="ti-pencil font-size-18"></i></a>

                                    <a href="{{ route('cms.show', $item->slug) }}" class="text-success"

                                        data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i

                                            class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>

                                   

                                </td>



                            </tr>

                        @endforeach



                    </tbody>

                    <tfoot>

                        <tr>

                            <th>#</th>

                            <th>Title</th>

                            <th>Short Description</th>

                            <th>Description</th>





                            <th>Image</th>

                            {{-- <th>Published At</th> --}}



                            <th>Action</th>

                        </tr>

                    </tfoot>

                </table>

            </div>

            <!-- /# card -->

        </div>

        <!-- /# column -->

    </div>

    <!-- /# row -->



@endsection

@include('Admin.sweetAlertMsg')

