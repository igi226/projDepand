@extends('Admin.Main.masterLayout')
@section('title', 'Application | Defendable Stuffing Agency')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h2>Job Applications</h2>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Job Title/Department</th>
                        {{-- <th>Job </th> --}}
                        
                        <th>Last Date of <br> Application</th>
                        <th>Applicant Name/<br>Date Applied</th>
                        <th width="15%">Status</th>
                        <th>Action</th>
                        {{-- --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($job_applications as $job_application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ @$job_application->employer->company_name }}</td>      
                        <td><a href="{{ route('jobs.show', $job_application->job->slug) }}">{{ $job_application->job->title }}</a> <br><span class="text-info">{{ $job_application->job->department->name }}</span></td>
                        <td> <span class="text-success">{{ $job_application->job->application_last_date }}</span></td>
                        <td><a href="{{ route('users.show',$job_application->employee->slug) }}">{{ $job_application->employee->name }}</a><br><span class="text-success">{{  Carbon\Carbon::parse($job_application->created_at)->format('D, d M Y H:i') }}</span></td>      
                        <td>
                            <div id="select{{ $job_application->id }}">
                            <select name="status" class="form-control" id="{{ $job_application->id }}"  onchange="GetSelectedTextValue(this,'{{ $job_application->id }}', '{{ $job_application->job_id }}', '{{ $job_application->user_id }}', '{{ $job_application->employer_id }}')">
                                <option value="{{ $job_application->status }}">
                                    @if ($job_application->status == 0)
                                    {{ "Pending" }}
                                    @elseif($job_application->status == 1)
                                    {{ "Viewed" }}
                                    @else
                                    {{ "Shortlisted" }}
                                    @endif
                                </option>
                                <option {{ $job_application->status == 0 ? 'hidden' : '' }} value="0">Pending</option>
                                <option {{ $job_application->status == 1 ? 'hidden' : '' }} value="1">View</option>
                                <option {{ $job_application->status == 2 ? 'hidden' : '' }} value="2">Shortlist</option>
                            </select>
                            </div>
                        </td>
                        {{-- <td>{{  Carbon\Carbon::parse($job_application->job->created_at)->format('D, d M Y H:i') }}</td> --}}
                        <td>
                            <a title="Resume" href="{{ asset('storage/Resume/'.@$job_application->employee->resume) }}"><i class="fa fa-download font-size-18"></i></a>
                            
                            <form method="POST" action="{{ route('employer.applicantDelete', $job_application->id) }}" class="action-icon d-inline-block pl-2">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="delete-icon show_confirm" data-toggle="tooltip" title='Delete'>
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
                        <th>Company Name</th>
                        <th>Job Title/Department</th>
                        <th>Last Date of <br>Application</th>
                        <th>Applicant Name/<br>Date Applied</th>
                        <th width="15%">Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
@section('applicantstatus')
<script>
        
        function GetSelectedTextValue(industry, row_id, job_id, user_id, employer_id) {
        var status = industry.value;
        function ajaxCall() {
            $.ajax({
  
                type: "GET",
                url: "{{ url('applicant/changeS') }}",
                data: {
                    'status': status,
                    'id': row_id,
                    'job_id': job_id,
                    'user_id': user_id,
                    'employer_id': employer_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                
                success: function (data) {
                    swal(data.msg);
                    // $("#select"+row_id).load(window.location.href + "#select"+row_id);

                           
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
        ajaxCall();
        }

</script>
@endsection
@include('Admin.sweetAlertMsg')