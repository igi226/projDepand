@extends('Admin.Main.masterLayout')
@section('title', 'Add-Package | Defendable Stuffing Agency')
@section('content')
<div class="">
    <div class="row">
       <div class="col-lg-3"></div>
       <div class="col-lg-6">
           <div class="card">
               <div class="card-title">
                   <h4>Create New Package</h4>
               </div>
               <div class="card-body">
                   <div class="basic-form">
                       <form action="{{ route('packages.store') }}" method="post">
                           @csrf
                           <div class="form-group">
                            <label>Package Name</label>
                            <input type="text" class="form-control" placeholder="Enter package_name....." name="package_name" value="{{ old('package_name') }}">
                            @if ($errors->has('package_name'))
                                <span class="text-danger">{{ $errors->first('package_name') }}</span>
                            @endif
                            </div>

                            <div class="form-group">
                                <label>Package Features</label>
                                <input type="text" class="form-control" placeholder="Enter features separated by comma(,)....." name="package_features" value="{{ old('package_features') }}">
                                @if ($errors->has('package_features'))
                                    <span class="text-danger">{{ $errors->first('package_features') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Package Type</label>
                                
                            {{-- <input type="text" class="form-control" placeholder="Enter package_type....." name="package_type" value="{{ old('package_type') }}"> --}}
                            <select name="package_type" class="form-control">
                                <option value="Monthly">Monthly</option>
                                <option value="Yearly">Yearly</option>
                                {{-- <option value="Monthly">Monthly</option> --}}
                            </select>
                            @if ($errors->has('package_type'))
                                    <span class="text-danger">{{ $errors->first('package_type') }}</span>
                                @endif
                            </div>
                
                            <div class="form-group">
                                <label>Package Price($)</label>
                                <input type="text" class="form-control" placeholder="Enter package_price....." name="package_price" value="{{ old('package_price') }}">
                                @if ($errors->has('package_price'))
                                    <span class="text-danger">{{ $errors->first('package_price') }}</span>
                                @endif
                            </div>
                            
                            
   
                           
   
                           <div class="text-center">
                           <button type="submit" class="btn btn-default btn-sm">Create</button>
                           <a href="{{ route('packages.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

  
@endsection
@include('Admin.sweetAlertMsg')  