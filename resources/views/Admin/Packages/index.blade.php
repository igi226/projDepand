@extends('Admin.Main.masterLayout')
@section('title', 'packages | Defendable Stuffing Agency')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Feature</th>

                        <th>Type</th>
                        <th>Price</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                        
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->package_name }}</td>
                        <td>{{ $item->package_features }}</td>
                        <td>{{ $item->package_type }}</td>
                        <td>${{ $item->package_price }}</td>
                        <td>
                            <label class="switch">
                                <input class="changePS" type="checkbox" data-id="{{ $item->slug }}"
                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                           </td>
                                 
                       
                        <td>
                            <a href="{{ route('packages.edit', $item->slug) }}" class="text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                    class="ti-pencil font-size-18"></i></a>
                            {{-- <a href="{{ route('packages.show', $item->slug) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a> --}}
                            <form method="POST" action="{{ route('packages.destroy', $item->slug) }}" class="action-icon d-inline-block pl-2">
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
                        <th>Name</th>
                        <th>Feature</th>

                        <th>Type</th>
                        <th>Price</th>
                        
                        <th>Status</th>
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
@section('changePS')



    <script>
        
        $(function() {
            $('.changePS').change(function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var data_id = $(this).attr('data-id');
                // var data_id = $(this).data('testiidmonial_id');
                //alert(data_id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/packages/changePS') }}",
                    data: {
                        'status': status,
                        'slug': data_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
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