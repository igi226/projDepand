

@extends('User.Dashboard.main')

@section('contentt')
<div>
    <div class="row">
        <div class="col-md-3">

       
        <label for="">Filter by Job</label>
        <select name="" id="" class="form-control" onchange="getApplicantByJob(this)">
            <option value="">select job</option>
            @foreach ($jobs as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    </div><br>
    <div class="panel-body">
        <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">Manage Applications</div>
        <table class="table table-striped" id="allApplicant">
            <thead class="">
                <tr>
                    <th>Applicant Name</th>
                    <th>Resume</th>
                    <th>Job Name</th>
                    <th>Date of Apply</th>
                    <th>Approval</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $item)
                    
                
                <tr>
                    <td>
                      <a href="{{ route('employer.viewApplicant', $item->slug) }}"> {{ $item->name }} </a>

                        
                    </td>
                    <td >
                       <a class="btn btn-primary text-white btn-xs" href="{{ asset('storage/Resume/'.$item->resume) }}" target="_blank" rel="noopener noreferrer">{{ " Download" }}</a>
                    </td>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td style="vertical-align: text-top;"></i>{{  Carbon\Carbon::parse($item->created_at)->format('D, d M Y H:i') }}</a></td>
                    <td>
                        
                        <select name="status" class="form-control" id="{{ $item->id }}"  onchange="GetSelectedTextValue(this,'{{ $item->id }}', '{{ $item->job_id }}', '{{ $item->user_id }}', '{{ $item->employer_id }}')">
                            <option value="{{ $item->status }}">
                                @if ($item->status == 0)
                                {{ "Pending" }}
                                @elseif($item->status == 1)
                                {{ "Viewed" }}
                                @else
                                {{ "Shortlisted" }}
                                @endif
                            </option>
                            <option {{ $item->status == 0 ? 'hidden' : '' }} value="0">Pending</option>
                            <option {{ $item->status == 1 ? 'hidden' : '' }} value="1">View</option>
                            <option {{ $item->status == 2 ? 'hidden' : '' }} value="2">Shortlist</option>
                        </select>
                        
                    </td>
                    <td>
                        {{-- <button onclick="" class="btn btn-danger btn-sm text-white">
                            <i class="fa fa-trash"></i>
                        </button> --}}
                        <form method="POST" action="{{ route('employer.applicantDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
                            @csrf
                            @method('DELETE')
                            {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                            <button type="submit" class="btn-danger btn-xs btn text-white show_confirm"
                                data-toggle="tooltip" title='Delete'>
                                <i class="fa fa-trash"></i></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div id="applicantByJob" class="d-none">

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
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: data.msg,
                            type: "success"
                        }, function() {
                           location.reload();
                        });
                    }, 1000);
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
@section('getApplicantByJob')
    <script>
        function getApplicantByJob(job) {
            var job_id = job.value;
            //alert(job_id);

            function ajaxCall() {
            $.ajax({
  
                url: 'aplicant/job/'+ job_id,
                type: "GET",
                data: {
                        'job_id': job_id,

                        '_token': '{{ csrf_token() }}'

                        },

                dataType: "JSON",
                success: function (data) {
                    // var x = JSON.stringify(data);
                      console.log(data.msg);
                 
               $('#allApplicant').hide();
             
                $('#applicantByJob').html(data.msg).removeClass("d-none").show();  

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
