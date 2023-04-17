@extends('Admin.Main.masterLayout')

@section('title', 'Facility Intake | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Company Name:</th>
                        <th>EIN Number:</th>
                        <th>Facility Name:</th>
                        <th>Employer name:</th>
                        <th>Query Date</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($requestFacility as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->ein_number }}</td>
                        
                        <td>{{ $item->facility_name }}</td>
                    
                        <td>{{ $item->u_name	 }}</td>
                        
                        <td>{{ $item->created_at }}</td>
                        
                        <td>
                            <a href="{{ route('requestFacilityView', $item->id) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>
                            <form method="POST" action="{{ route('requestFacilityDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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
                        <th>Company Name:</th>
                        <th>EIN Number:</th>
                        <th>Facility Name:</th>
                        <th>Corporate Billing Contact:</th>
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