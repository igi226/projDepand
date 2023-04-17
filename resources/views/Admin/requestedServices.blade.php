@extends('Admin.Main.masterLayout')

@section('title', 'Requested Services | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                       


                        <th>Phone</th>

                        <th>Address</th>
                        <th>Service Type</th>

                        <th>Message</th>

                      

                        <th>Query date</th>

                        <th>Action</th>

                      

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach ($requested_services as $item)

                        

                   

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->name }}</td>
                        {{-- <td>{{ $item->email }}</td> --}}
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->service_type }}</td>
                        <td>{{ $item->message }}</td>
                        

                                 

                        

                        

                        <td>{{ $item->created_at }}</td>

                        <td>
                            <form method="POST" action="{{ route('requestServisesDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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

                       



                        <th>Phone</th>

                        <th>Address</th>
                        <th>Service Type</th>
                        <th>Message</th>

                      
                      

                        <th>Query date</th>

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