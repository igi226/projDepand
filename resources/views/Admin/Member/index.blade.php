@extends('Admin.Main.masterLayout')

@section('title', 'Members | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Image</th>



                        <th>Facebook</th>

                        <th>Twitter</th>

                        <th>Github</th>

                        <th>Dribbble</th>

                        <th>Join date</th>

                        <th>Action</th>

                      

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach ($mebers as $item)

                        

                   

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->name }}</td>

                        @if (isset($item->image) && !empty($item->image) && File::exists(public_path("storage/MemberImage/" . $item->image)))

                        <td><img height="80" width="100" src="{{ asset('storage/MemberImage/'.$item->image)}}" alt=""></td>

                        @else

                                <td><img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> </td>

                        @endif            

                        <td>

                            <a href="{{ $item->facebook }}" target="_blank" rel="noopener noreferrer">Visit Facebook</a>

                            

                        </td>

                        <td><a href="{{ $item->twitter }}" target="_blank" rel="noopener noreferrer">Visit Twitter</a>

                        </td>

                        <td><a href="{{ $item->github }}" target="_blank" rel="noopener noreferrer">Visit Git</a>

                        </td>

                        <td><a href="{{ $item->dribbble }}" target="_blank" rel="noopener noreferrer">Visit Dribbble</a>

                        </td>

                        <td>{{ $item->created_at }}</td>

                        <td>

                            <a href="{{ route('members.edit', $item->slug) }}" class="text-primary"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i

                                    class="ti-pencil font-size-18"></i></a>

                            <a href="{{ route('members.show', $item->slug) }}" class="text-success"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i

                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>

                                <form method="POST" action="{{ route('members.destroy', $item->slug) }}" class="action-icon d-inline-block pl-2">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-icon show_confirm"

                                    data-toggle="tooltip" title='Delete'>

                                    <i class="fa fa-trash-o font-size-18 text-danger"></i>

                                </button>

                            </form>

                        </td>

                        

                    </tr>

                    @endforeach

                   

                </tbody>

                <tfoot>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Image</th>



                        <th>Facebook</th>

                        <th>Twitter</th>

                        <th>Github</th>

                        <th>Dribbble</th>

                        <th>Join date</th>

                        <th>Action</th>

                    </tr>

                </tfoot>

            </table>

        </div>

        <!-- /# card -->

    </div>

    <!-- /# column -->

</div>

    

@endsection

@include('Admin.sweetAlertMsg')