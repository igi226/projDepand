@extends('User.Dashboard.main')

@section('contentt')
<div>
    <div class="panel-body">
        <div class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3">Shortlisted Jobs</div>
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Hr Contact</th>
                     <th>Date of Shortlisted</th>
                  {{--  <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($sortlisted as $item)
                    
                
                <tr>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td">
                        {{ DB::table('users')->where('id',$item->employer_id)->value('company_name') }}
                    </td>
                    <td>{{ DB::table('users')->where('id',$item->employer_id)->value('phone') }}</td>
                   <td>{{  Carbon\Carbon::parse($item->updated_at)->format('D, d M Y H:i') }}</td>
                    <td class="text-success"> Congratulation</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection
