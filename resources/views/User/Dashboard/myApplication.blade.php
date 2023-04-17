@extends('User.Dashboard.main')

@section('contentt')
<div>
    <div class="panel-body">
        <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">Manage Applications</div>
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Total Applicant</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($myApplications->count()>0)
                @foreach ($myApplications as $item)
                    
                
                <tr>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>
                        {{ DB::table('users')->where('id',$item->employer_id)->value('company_name') }}
                    </td>
                    <td>{{ DB::table('job_applications')->where('job_id',$item->job_id)->count() }}</td>
                    <td>
                        @if ($item->status == 0)
                        <span class="badge rounded-pill badge-soft-danger font-size-12">Pending </span>
                        @elseif($item->status == 1)
                        <span class="badge rounded-pill badge-soft-primary font-size-12"> Viewed</span>
                        @else
                        <span class="badge rounded-pill badge-soft-success font-size-12"> Shortlisted</span>
                        @endif
                        
                    </td>
                    
                    <td style="vertical-align: text-top;">
                        <form method="POST" action="{{ route('employee.myApplicationDelete', $item->id) }}" class="action-icon d-inline-block pl-2">
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
                @else
                <tr>
                    <td></td>
                    <td></td>
                    <td>No Application</td>
                    <td></td>
                    <td></td>
                </tr> 
                @endif
              
                
            </tbody>
        </table>
    </div>
</div>
@endsection
@include('Admin.sweetAlertMsg')

