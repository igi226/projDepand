<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.html">
                    <a href=""> <img src="{{ asset('storage/SiteImages/'. $site_info->logo_image) }}" alt="" /></a></div>
                <li class="label">Main</li>
                {{-- <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span
                            class="badge badge-primary">2</span> <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="index.html">Dashboard 1</a></li>
                        <li><a href="index.html">Dashboard 2</a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ url('admin/dashboard') }}"><i class="ti-home"></i> Dashboard </a></li>
                <li class="label">Management</li>
                <li class={{ Request::segment(2) == "users" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-user"></i> Employee <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('users.index') ? 'active' : '' }} ><a href="{{ route('users.index') }}">List of Employees</a></li>
                        <li class={{ Route::is('users.create') ? 'active' : '' }}><a href="{{ route('users.create') }}">Add Employee</a></li>
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "employers" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-user"></i> Employer <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('employers.index') ? 'active' : '' }} ><a href="{{ route('employers.index') }}">List of Employers</a></li>
                        <li class={{ Route::is('employers.create') ? 'active' : '' }}><a href="{{ route('employers.create') }}">Add Employer</a></li>
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "sub-admins" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-user"></i> Subadmins <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('sub-admins.index') ? 'active' : '' }} ><a href="{{ route('sub-admins.index') }}">List of Subdmins</a></li>
                        <li class={{ Route::is('sub-admins.create') ? 'active' : '' }}><a href="{{ route('sub-admins.create') }}">Add Subdmins</a></li>
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "members" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-stamp"></i>Team Members <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('members.index') ? 'active' : '' }}><a href="{{ route('members.index') }}">List of Team Members</a></li>
                        <li class={{ Route::is('members.create') ? 'active' : '' }}><a href="{{ route('members.create') }}">Add Team Menber</a></li>
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "blogs" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-write"></i> Blogs <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('blogs.index') ? 'active' : '' }}><a href="{{ route('blogs.index') }}">List of Blogs</a></li>
                        <li class={{ Route::is('blogs.create') ? 'active' : '' }}><a href="{{ route('blogs.create') }}">Add Blog</a></li>
                        <li class={{ Request::is('admin/comments') ? 'active' : '' }}><a href="{{ url('admin/comments') }}">List of Comments</a></li>
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "cms" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-agenda"></i> Content Management  <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('cms.index') ? 'active' : '' }}><a href="{{ route('cms.index') }}">List of Sections</a></li>
                        {{-- <li class={{ Route::is('cms.create') ? 'active' : '' }}><a href="{{ route('cms.create') }}">Add Cms</a></li> --}}
                        {{-- <li><a href="{{ url('admin/comments') }}">Comments</a></li> --}}
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "departments" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-layout-grid4"></i> Departments  <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('departments.index') ? 'active' : '' }}><a href="{{ route('departments.index') }}">List of Departments</a></li>
                        <li class={{ Route::is('departments.create') ? 'active' : '' }}><a href="{{ route('departments.create') }}">Add Department</a></li>
                        {{-- <li><a href="{{ url('admin/comments') }}">Comments</a></li> --}}
                        
                    </ul>
                </li>

                <li class={{ Request::segment(2) == "jobs" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-layout-list-post"></i> Job  <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('jobs.index') ? 'active' : '' }}><a href="{{ route('jobs.index') }}">List of Jobs</a></li>
                        <li class={{ Route::is('jobs.create') ? 'active' : '' }}><a href="{{ route('jobs.create') }}">Add Job</a></li>
                        <li class={{ Route::is('jobApplicantList') ? 'active' : '' }}><a href="{{ route('jobApplicantList') }}">Applicant List</a></li>
                        
                    </ul>
                </li>

                {{-- <li class={{ Request::segment(2) == "packages" ? "open": "" }}><a class="sidebar-sub-toggle"><i class="ti-layout-list-post"></i> Packages  <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li class={{ Route::is('packages.index') ? 'active' : '' }}><a href="{{ route('packages.index') }}">List of Packages</a></li>
                        <li class={{ Route::is('packages.create') ? 'active' : '' }}><a href="{{ route('packages.create') }}">Add Package</a></li>
                      
                        
                    </ul>
                </li> --}}

                <li class={{ Request::is('admin/terms') ? 'active' : '' }}><a href="{{ url('admin/terms') }}"><i class="ti-book"></i> Terms&Condition </a></li>
                <li class={{ Request::is('admin/request-Servises') ? 'active' : '' }}><a href="{{ url('admin/request-Servises') }}"><i class="ti-comment-alt"></i> Service Requested </a></li>
                <li class={{ Request::is('admin/request-talent') ? 'active' : '' }}><a href="{{ url('admin/request-talent') }}"><i class="ti-comment-alt"></i>  Request Talent Form </a></li>
                <li class={{ Request::is('admin/resume-request') ? 'active' : '' }}><a href="{{ url('admin/resume-request') }}"><i class="ti-comment-alt"></i>  Submit Resume Form </a></li>
                <li class={{ Request::is('admin/facility-request') ? 'active' : '' }}><a href="{{ url('admin/facility-request') }}"><i class="ti-comment-alt"></i>  Facility Intake Form </a></li>
                <li class={{ Request::is('admin/patient-referrals-list') ? 'active' : '' }}><a href="{{ route('patientReffarlList') }}"><i class="ti-comment-alt"></i>  Patient Referrals List</a></li>
                <li class={{ Request::is('admin/site-informations') ? 'active' : '' }}><a href="{{ url('admin/site-informations') }}"><i class="ti-settings"></i> Site Settings </a></li>
                
                <li><a href="{{ route('logOut') }}"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>