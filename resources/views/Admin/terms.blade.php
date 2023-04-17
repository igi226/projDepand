@extends('Admin.Main.masterLayout')
@section('title', 'Users | Defendable Stuffing Agency')
@section('content')
<div>
    <form action="{{ route('terms') }}" method="post">
        @csrf
    <div class="form-group">
        <label>Description</label>
        <textarea id="summernote" type="text" class="form-control" placeholder="Enter terms....." name="terms">{{ $terms->terms }}</textarea>
       
        @if ($errors->has('terms'))
            <span class="text-danger">{{ $errors->first('terms') }}</span>
        @endif
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-default btn-sm ">Update</button>
        {{-- <button onclick="{{ route('blogs.index') }}" class="btn btn-danger btn-sm">Cancel</button> --}}
    </div>
</form>
   
</div>
@endsection
@include('Admin.sweetAlertMsg')
