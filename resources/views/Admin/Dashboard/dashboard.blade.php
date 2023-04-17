@extends('Admin.Main.masterLayout')

@section('title', 'Dashboard | Defendable Stuffing Agency')





@section('content')

<div class="row">

    <div class="col-lg-8 p-r-0 title-margin-right">

        <div class="page-header">

            <div class="page-title">

                <h1>Hello, <span>Welcome Here</span></h1>

            </div>

        </div>

    </div>

    <!-- /# column -->

    <div class="col-lg-4 p-l-0 title-margin-left">

        <div class="page-header">

            <div class="page-title">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item active">Home</li>

                </ol>

            </div>

        </div>

    </div>

    <!-- /# column -->

</div>

<div class="row">

    <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>

                </div>

                <div class="stat-content dib">

                    <div class="stat-text">Total Users</div>
@php
    $users = DB::table('users')->get()->count();
    $employees = DB::table('users')->where('user_type', 'Employee')->get()->count();
    $employers = DB::table('users')->where('user_type', 'Employer')->get()->count();
    $jobs = DB::table('jobs')->get()->count();
    $blogs = DB::table('blogs')->get()->count();
@endphp
                    <div class="stat-digit">{{ $users  }}</div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-layout-list-post color-primary border-primary"></i>

                </div>

                <div class="stat-content dib">

                    <div class="stat-text">Total Employees</div>

                    <div class="stat-digit">{{ $employees  }}</div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-layout-list-post color-primary border-primary"></i>

                </div>

                <div class="stat-content dib">

                    <div class="stat-text">Total Employer</div>

                    <div class="stat-digit">{{ $employers  }}</div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-layout-list-post color-primary border-primary"></i>

                </div>

                <div class="stat-content dib">

                    <div class="stat-text">Total Jobs</div>

                    <div class="stat-digit">{{ $jobs }}</div>

                </div>

            </div>

        </div>

    </div>

    {{-- <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>

                </div>

                <div class="stat-content dib">

                    <div class="stat-text">Active Jobs</div>

                    <div class="stat-digit">770</div>

                </div>

            </div>

        </div>

    </div> --}}

    <div class="col-lg-3">

        <div class="card">

            <div class="stat-widget-one">

                <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>

                <div class="stat-content dib">

                    <div class="stat-text">Total Blogs</div>

                    <div class="stat-digit">{{ $blogs }}</div>

                </div>

            </div>

        </div>

    </div>

</div>

    

@endsection