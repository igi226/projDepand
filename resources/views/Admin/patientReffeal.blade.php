@extends('Admin.Main.masterLayout')

@section('title', 'Patient Reff | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>First Name:</th>
                        <th>Last Name:</th>
                        <th>POA First Name:</th>
                        <th>POA Last Name:</th>
                        <th>Email:</th>
                        <th>Zipcode:</th>
                        <th>Query Date</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($patient_reffeal as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        
                        <td>{{ $item->poa_first_name }}</td>
                        <td>{{ $item->poa_last_name }}</td>
                    
                        <td>{{ $item->email	 }}</td>
                        <td>{{ $item->zipcode	 }}</td>
                    
                        
                        <td>{{ $item->created_at }}</td>
                        
                        <td>
                            <a href="{{ route('patientReffarlView', $item->id) }}" class="text-success"
                            
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>
                            <form method="POST" action="{{ route('patientReffarlDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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
                        <th>First Name:</th>
                        <th>Last Name:</th>
                        <th>POA First Name:</th>
                        <th>POA Last Name:</th>
                        <th>Email:</th>
                        <th>Zipcode:</th>
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