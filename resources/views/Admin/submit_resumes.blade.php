@extends('Admin.Main.masterLayout')

@section('title', 'Requested Resumes | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Message</th>
                        <th>Resume</th>
                        <th>Employee Name</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($submit_resumes as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        
                        <td>{{ $item->address }}</td>
                       
                        <td>{{ $item->message }}</td>
                        @if (isset($item->resume) && !empty($item->resume) && File::exists(public_path("storage/Resume/" . $item->resume)))
                        <td><a href="{{ asset('storage/Resume/'. $item->resume) }}" target="_blank" rel="noopener noreferrer">Preview Resume</a></td>
                        @else
                        <td>no resume</td>
                        @endif
                        <td>{{ $item->u_name }}</td>
                        <td>
                            {{-- <a href="{{ route('requestTalentView', $item->id) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a> --}}
                            <form method="POST" action="{{ route('requestResumeDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Message</th>
                        <th>Resume</th>
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