@extends('User.Dashboard.main')

@section('contentt')
<div class="row justify-content-between align-items-center">
    <div class=" col-md-4">
        <div class="form-group ">
            <label>Sort by Industry Type</label>
            <select id="industry" class="form-control" onchange="GetSelectedTextValue(this)">
            <option value="">Select Industry</option>
            
            @foreach ($departments as $item)
                <option value="{{  $item->id }}">{{ $item->name }}<option>
            @endforeach
            
            </select>
            @if ($errors->has('type'))
            <span class="text-danger">{{ "type is required field" }}</span>
            @endif
        </div> 
    </div>
    
     <div class="col-md-6">
        <form action="">

            <div class="d-flex align-items-center">
                <div class="pr-2 flex-fill"><input type="search" class="form-control" name="search" placeholder="Search by job title" value="{{ $search }}"></div>
                <div>
                    <button class="btn btn-primary" style="min-height: 44px;">Search</button>
                    <a class="btn btn-secondary " href="{{ route('employee.allJobs') }}" style="min-height: 44px;line-height:32px;">Reset</a>
                </div>
            </div>
            
            
        </form>
     </div>
</div>
 


    <div >
        <div class="panel-body">
            <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">
                @if (auth()->user()->user_type == 'Employer')
                Manage My Jobs
            @else
            Look for Job
            @endif
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
                        <th width="110">Action</th>
                    </tr>
                </thead>
                <tbody id="allJobs">
                    @foreach ($postedJobs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ !empty($item->title) ? $item->title : 'No Job' }}</td>
                            <td>{{ $item->number_of_post }}</td>
                            <td>{{ DB::table('job_applications')->where('job_id', $item->id)->count() }}</td>
                            <td>{{ !empty($item->created_at) ? Carbon\Carbon::parse($item->created_at)->format('D, d M Y H:i') : 'No Date' }}
                            </td>
                            <td>{{ !empty($item->application_last_date) ? Carbon\Carbon::parse($item->application_last_date)->format('D, d M Y H:i') : 'No Job' }}
                            </td>

                            <td>
                                <a href="{{ route('employer.viewJob', $item->slug) }}" class="btn btn-xs  btn-primary text-white"><i
                                    class="fa fa-eye"></i></a>
                                @if (auth()->user()->user_type == 'Employer')
                                
                            <a href="{{ route('employer.editJob', $item->slug) }}" class="btn btn-xs  btn-secondary text-white"><i
                                    class="fa fa-edit"></i></a>
                            <form method="POST" action="{{ route('employer.deleteJob', $item->slug) }}"
                                class="action-icon d-inline-block ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs  btn-danger text-white  btn-flat delete_confirm " data-toggle="tooltip" title='Delete'><i class="fa fa-trash-o font-size-18 "></i></button>
                            </form>  
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tbody id="filteredJobs" class="d-none">
                    
                </tbody>
            </table>
           
                
          
            <div class="row">
                <div class="col-md-12">
                    <nav class="custom-pagination-nav mt-4">
                        <ul class="pagination justify-content-center">
                           
                            {{ $postedJobs->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
          
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

{{-- get jobs by department --}}
     @section('getByInduatry')
<script type="text/javascript">
    function GetSelectedTextValue(industry) {
        // var selectedText = ddlFruits.options[ddlFruits.selectedIndex].innerHTML;// to get the the text
        var id = industry.value;
        //  alert(slug);
         function ajaxCall() {
            $.ajax({
  
                url: 'job/indutry/'+ id,
                type: "GET",
                data: {
                        'id': id,

                        '_token': '{{ csrf_token() }}'

                        },

                dataType: "JSON",
                success: function (data) {
                    // var x = JSON.stringify(data);
                    console.log(data);
                    $('#allJobs').hide();
             
             $('#filteredJobs').html(data.msg).removeClass("d-none").show(); 
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
