@extends('Admin.Main.masterLayout')

@section('title', 'Comments | Defendable Stuffing Agency')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Commented By</th>

                        <th>Blog</th>



                        

                        <th>Comment</th>

                        <th>Published At</th>

                        <th>Action</th>

                      

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach ($comments as $item)

                        
{{-- {{ dd($item->blog->title) }} --}}
                   

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->user->name }}</td>

                     

                        <td>{{ @$item->blog->title}}</td>

                        <td>{{ $item->comment }}</td>

                       

                    

                        <td>{{  Carbon\Carbon::parse($item->created_at)->format('D, d M Y H:i') }}</td>

                        

                        <td>

                            {{-- <a href="{{ route('blogs.edit', $item->slug) }}" class="text-primary"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i

                                    class="ti-pencil font-size-18"></i></a> --}}

                            {{-- <a href="{{ route('blogs.show', $item->slug) }}" class="text-success"

                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i

                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a> --}}

                            {{-- <form method="POST" action="{{ url('admin/delete-comments/', $item->slug) }}" class="action-icon d-inline-block pl-2">

                                @csrf

                                @method("DELETE")

                                <input name="_method" type="hidden" value="DELETE">

                                <button type="submit" class="delete-icon show_confirm"

                                    data-toggle="tooltip" title='Delete'>

                                    <i class="fa fa-trash-o font-size-18 text-danger"></i>

                                </button>

                            </form> --}}

                            {{-- <button class="btn delete-icon btn-flat btn-sm remove-user" data-id="{{ $item->id }}" data-action="{{ url('admin/delete-comments/',$item->id) }}" onclick="deleteConfirmation({{$item->id}})"> <i class="fa fa-trash-o font-size-18 text-danger"></i></button> --}}
                            <button class="btn delete-icon btn-flat btn-sm remove-user" data-id="{{ $item->id }}" > <i class="fa fa-trash-o font-size-18 text-danger"></i></button>

                        </td>

                        

                    </tr>

                    @endforeach

                   

                </tbody>

                <tfoot>

                    <tr>

                        <th>#</th>

                        <th>Commented By</th>

                        <th>Blog</th>



                        

                        <th>Comment</th>

                        <th>Published At</th>



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