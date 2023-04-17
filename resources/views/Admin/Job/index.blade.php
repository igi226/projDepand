@extends('Admin.Main.masterLayout')

@section('title', 'Jobs | Defendable Stuffing Agency')

@section('content')



<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Posted by</th>
                        <th>Posted on</th>

                        <th>Title</th>

                        <th>Department</th>

                        <th>Position name</th>

                        <th>Location</th>

                        <th>Application End date</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($jobs as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ @$item->user->email}}</td>
                        <td>{{ Carbon\Carbon::parse(@$item->created_at)->format('D, d M Y H:i') }}</td>

                        <td>{{ @$item->title }}</td>
                        <td> {{ @$item->department->name }} </td>
                        <td> {{ @$item->position }} </td>
                        <td>{{ @$item->location }}</td>
                        <td>{{ Carbon\Carbon::parse(@$item->application_last_date)->format('D, d M Y H:i') }}</td>

                        <!-- <td>{{ implode(' ', array_slice(str_word_count(htmlspecialchars(trim(strip_tags(@$item->description))), 2), 0, 10)) }}

                            <br><a href="{{ route('jobs.show', @$item->slug) }}"> Read More </a>

                        </td> -->




                        <!-- <td>{{ @$item->type }}</td>

                        <td>{{ @$item->experience }}</td>

                        

                        <td>{{ @$item->compensation }}</td> -->




                        <td>

                            <a href="{{ route('jobs.edit', @$item->slug) }}" class="text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                    class="ti-pencil font-size-18"></i></a>

                            <a href="{{ route('jobs.show', @$item->slug) }}" class="text-success"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="view"><i
                                    class="ti-eye font-size-18 pl-2" style="font-size: 20px"></i></a>
                            <a href="{{ asset('storage/JobDoc/'.@$item->job_doc) }}" class="text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                    class="fa fa-download font-size-18"></i></a>
                            <form method="POST" action="{{ route('jobs.destroy', @$item->slug) }}"
                                class="action-icon d-inline-block pl-2">
                                @csrf
                                @method("DELETE")

                                <button type="submit" class="delete-icon show_confirm" data-toggle="tooltip"
                                    title='Delete'>

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
                        <th>Posted by</th>
                        <th>Posted on</th>

                        <th>Title</th>

                        <th>Department</th>

                        <th>Position name</th>

                        <th>Location</th>

                        <th>Application End date</th>

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