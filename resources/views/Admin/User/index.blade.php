@extends('Admin.Main.masterLayout')
@section('title', 'Users | Defendable Stuffing Agency')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h4>List of Employees({{ $users->count() }})</h2>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email verified</th>

                        <th>Status</th>
                        <th>Join date</th>
                        <th>Last login date</th>
                        <th>Action</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                       <td>
                            <label class="switch">
                             
                                <input class="changeEV" type="checkbox" data-id="{{ $item->slug }}"
                                    {{ $item->email_verified_at != null ? 'checked' : '' }} data-toggle="toggle" data-size="sm">
                                  
                                {{-- <span class="slider round"></span> --}}
                            </label>
                           </td>
                        <td>
                            <label class="switch">
                             
                                <input class="changeS" type="checkbox" data-id="{{ $item->slug }}"
                                    {{ $item->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-size="sm">
                                  
                                {{-- <span class="slider round"></span> --}}
                            </label>
                           </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->last_login_time }}</td>
                        
                        <td>
                            <a href="{{ route('users.edit', $item->slug) }}" class="text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                    class="ti-pencil font-size-18"></i></a>
                            <a href="{{ route('users.show', $item->slug) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>
                            <form method="POST" action="{{ route('users.destroy', $item->slug) }}" class="action-icon d-inline-block pl-2">
                                @csrf
                                @method('DELETE')
                                {{-- <input name="_method" type="hidden" value="DELETE"> --}}
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
                        <th>Email</th>
                        <th>Email verified</th>

                        <th>Status</th>
                        <th>Join date</th>
                        <th>Last Login date</th>

                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>
<!-- /# row -->

@endsection
@section('status')



    <script>
          $(document).ready(function() {
        $('#example').DataTable();
   
        $(function() {
            // $('.changeS').change(function() {
                $(".changeS").bind("change", function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var data_id = $(this).attr('data-id');
                // var data_id = $(this).data('testiidmonial_id');
                //alert(data_id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/user/changeS') }}",
                    data: {
                        'status': status,
                        'slug': data_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        // alert('updated');
                        // location.reload();
                        setTimeout(function() {
                            swal({
                                title: "Success!",
                                text: response.msg,
                                type: "success"
                            }, function() {
                                window.location
                            });
                        }, 1000);
                    }
                });
            })
        })
    } );  
    </script>



@endsection
@section('changeEmailV')
<script>
     
    $(function() {
        $('.changeEV').change(function() {

            var is_email_verified = $(this).prop('checked') == true ? 1 : 0;
            var data_id = $(this).attr('data-id');
            // var data_id = $(this).data('testiidmonial_id');
            //alert(data_id);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/user/changeEV') }}",
                data: {
                    'is_email_verified': is_email_verified,
                    'slug': data_id,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    // console.log(response);
                    // alert('updated');
                    // location.reload();
                    setTimeout(function() {
                        swal({
                            title: "Success!",
                            text: response.msg,
                            type: "success"
                        }, function() {
                            window.location
                        });
                    }, 1000);
                }
            });
        })
    })
</script>
@endsection
@include('Admin.sweetAlertMsg')