@extends('Admin.Main.masterLayout')

@section('title', 'Requested Talent | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>

                        
                        <th>Job Function</th>

                       


                        <th>Company</th>

                        <th>Position Type</th>
                   

                        <th>Email Address</th>

                      

                        {{-- <th>Name</th>

                        
                        <th>Job Title</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip Code</th>
                        <th>Message</th> --}}
                        <th>Query Date</th>

                        <th>Action</th>


                      

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach ($requested_talent as $item)

                        

                   

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->company }}</td>
                        <td>{{ $item->jobfunction }}</td>
                        
                        <td>{{ $item->positiontype }}</td>
                    
                        <td>{{ $item->email }}</td>
                        
                        <td>{{ $item->created_at }}</td>
                        
                        <td>
                            <a href="{{ route('requestTalentView', $item->id) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>
                            <form method="POST" action="{{ route('requesttalentDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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

                        
                        <th>Job Function</th>

                       


                        <th>Company</th>

                        <th>Position Type</th>
                   

                        <th>Email Address</th>

                      

                        {{-- <th>Name</th>

                        
                        <th>Job Title</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip Code</th>
                        <th>Message</th> --}}
                        <th>Query Date</th>

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