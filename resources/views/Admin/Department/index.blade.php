@extends('Admin.Main.masterLayout')

@section('title', 'Departments | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>

                        <th class="text-center">Name</th>

                        <th class="text-center">Image</th>



                       

                        <th class="text-center">Status</th>

                        <th class="text-center">Action</th>

                      

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach ($departments as $item)

                        

                   

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->name }}</td>

                        @if (isset($item->image) && !empty($item->image) && File::exists(public_path("storage/DepartmentImage/" . $item->image)))

                        <td class="text-center"><img height="80" width="100" src="{{ asset('storage/DepartmentImage/'.$item->image)}}" alt=""></td>

                        @else

                                <td class="text-center"><img height="80" width="100" src="{{asset('noimg.png')}}" alt="no-p_image"> </td>

                        @endif            

                        

                        <td>

                            <label class="switch">

                                <input class="changeS" type="checkbox" data-id="{{ $item->slug }}"

                                    {{ $item->status == 1 ? 'checked' : '' }}>

                                <span class="slider round"></span>

                            </label>

                        </td>

                        <td>

                            <a href="{{ route('departments.edit', $item->slug) }}" class="text-primary"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i

                                    class="ti-pencil font-size-18"></i></a>

                            <!-- <a href="{{ route('departments.show', $item->slug) }}" class="text-success"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i

                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a> -->

                                    <form method="POST" action="{{ route('departments.destroy', $item->slug) }}" class="action-icon d-inline-block pl-2">
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

                        <th class="text-center">Name</th>

                        <th class="text-center">Image</th>





                        <th class="text-center">Status</th>

                        <th class="text-center">Action</th>

                    </tr>

                </tfoot>

            </table>

        </div>

        <!-- /# card -->

    </div>

    <!-- /# column -->

</div>

    

@endsection
@section('status')



    <script>
        
        $(function() {
            $('.changeS').change(function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var data_id = $(this).attr('data-id');
                // var data_id = $(this).data('testiidmonial_id');
                //alert(data_id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/department/changeS') }}",
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
    </script>



@endsection
@include('Admin.sweetAlertMsg')