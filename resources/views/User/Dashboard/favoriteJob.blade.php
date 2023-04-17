@extends('User.Dashboard.main')

@section('contentt')


    <div>
        <div class="panel-body">
            <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">
               Favourite Job list
        </div>
            <table class="table table-striped">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Total Vacancy</th>
                        <th>Total Applicant</th>
                        <th>Posted Date</th>
                        <th>Last Date of Apply</th>
                        <!-- <th>Status</th> -->
                        <th width="110">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favouriteJobs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->number_of_post }}</td>
                            <td>{{ DB::table('job_applications')->where('job_id', $item->id)->count() }}</td>
                            <td>{{ !empty($item->created_at) ? Carbon\Carbon::parse($item->created_at)->format('D, d M Y H:i') : 'No Job' }}
                            </td>
                            <td>{{ !empty($item->application_last_date) ? Carbon\Carbon::parse($item->application_last_date)->format('D, d M Y H:i') : 'No Job' }}
                            </td>

                            <td>
                                {{-- <a href="{{ route('employer.viewJob', $item->slug) }}" class="btn"><i
                                    class="fa fa-eye"></i></a>
                                @if (auth()->user()->user_type == 'Employer')
                                
                            <a href="{{ route('employer.editJob', $item->slug) }}" class="btn"><i
                                    class="fa fa-edit"></i></a>
                     --}}
                            <form method="POST" action="{{ route('employee.applyJob') }}"
                                class="action-icon d-inline-block pl-2">
                                @csrf
                                
                                <input type="hidden" name="job_id" value="{{ $item->id }}">
                                       <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}">
                                       <input type="hidden" name="receiver_id" value="{{ $item->employer_id }}">
                                       <button class="btn btn-primary btn-sm">Apply</button>
                            </form>  
                               
                               
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
           
                
          
            {{-- <div class="row">
                <div class="col-md-12">
                    <nav class="custom-pagination-nav mt-4">
                        <ul class="pagination justify-content-center">
                           
                            {{ $postedJobs->links() }}
                        </ul>
                    </nav>
                </div>
            </div> --}}
          
        </div>
    </div>
@endsection
@section('deleteJob')
    
    <script type="text/javascript">

        $(document).on('click',''.delete_confirm'',function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Are you sure ?`,
                 text: "You won't be able to revert this!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                 form.submit();
               }
             });
         });
   
   </script>
@endsection

@include('Admin.sweetAlertMsg')
