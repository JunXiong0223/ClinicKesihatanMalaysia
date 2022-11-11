<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ url('assetsAdmin/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{ url('assetsAdmin/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assetsAdmin/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assetsAdmin/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ url('assetsAdmin/css/Article-Clean.css') }}">
    <link rel="stylesheet" href="{{ url('assetsAdmin/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @yield('js')
</head>

<body>
    <ul class="nav flex-column shadow d-flex sidebar mobile-hid">
        <li class="nav-item logo-holder">
            <div class="text-center text-white logo py-4 mx-4"><a class="text-white text-decoration-none" id="title" href="#"><strong>Admin</strong></a><a class="text-white float-right" id="sidebarToggleHolder" href="#"><i class="fas fa-bars" id="sidebarToggle"></i></a></div>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-left text-white py-1 px-0" href="{{ route('admin.home') }}">
                <i class="fas fa-tachometer-alt mx-3"></i><span class="text-nowrap mx-2">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-left text-white py-1 px-0" href="{{ route('admin.appointment') }}">
                <i class="fa fa-calendar-o mx-3"></i><span class="text-nowrap mx-2">Appointment</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#">
                <i class="fa fa-user-md mx-3" aria-hidden="true"></i></i><span class="text-nowrap mx-2">Staff</span><i class="fas fa-caret-down float-none float-lg-right fa-sm"></i></a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('admin.staffList') }}"><span>Staff List</span></a>
                <a class="dropdown-item text-white" href="{{ route('admin.createStaff') }}"><span>Create Staff</span></a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#">
                <i class="fa fa-hospital-o mx-3" aria-hidden="true"></i></i><span class="text-nowrap mx-2">Clinics</span>
                <i class="fas fa-caret-down float-none float-lg-right fa-sm"></i>
            </a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('admin.clinics') }}">
                    <span>Clinics Manage</span>
                </a>
                <a class="dropdown-item text-white" href="{{ route('admin.clinicManage') }}">
                    <span>Clinic Create</span>
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks mx-3" aria-hidden="true"></i></i><span class="text-nowrap mx-2">Healthcare Services</span>
                <i class="fas fa-caret-down float-none float-lg-right fa-sm"></i>
            </a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('admin.healthServiceList') }}">
                    <span>Healthcare Services Manage</span>
                </a>
                {{-- <a class="dropdown-item text-white" href="{{ route('admin.healthServiceManage') }}">
                    <span>Healthcare Services Create</span>
                </a> --}}
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#">
                <i class="fa fa-clock-o mx-3" aria-hidden="true"></i></i><span class="text-nowrap mx-2">Services Time Slot</span>
                <i class="fas fa-caret-down float-none float-lg-right fa-sm"></i>
            </a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('admin.timeSlotList') }}">
                    <span>Service Time Slot Manage</span>
                </a>
                {{-- <a class="dropdown-item text-white" href="{{ route('admin.timeSlotManage') }}">
                    <span>Service Time Slot Create</span>
                </a> --}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-left text-white py-1 px-0" href="{{ route('reminder') }}">
                <i class="fa fa-envelope  mx-3" aria-hidden="true"></i>
                Send Reminder
            </a>
        </li>
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-sliders-h mx-3"></i><span class="text-nowrap mx-2">Settings</span><i class="fas fa-caret-down float-none float-lg-right fa-sm"></i></a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('admin.resetpassword') }}"><span>Change password</span></a>
            </div>
        </li>
        
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt mx-3"></i><i class="fa fa-caret-right d-none position-absolute"></i><span class="text-nowrap mx-2">Log out</span></a></li>
    </ul>
    <div class="container article-clean">
        @if (Session::has('success'))
            <div class="alert alert-success text-break alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('success') }}</span>
            </div>
            {{ Session::forget('success') }}
        @endif
        @if (Session::has('failed'))
            <div class="alert alert-danger text-break alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('failed') }}</span>
            </div>
            {{ Session::forget('failed') }}
        @endif
        @if (Session::has('error'))
            <div class="alert alert-warning text-break alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('error') }}</span>
            </div>
            {{ Session::forget('error') }}
        @endif
        @yield('content')
        
    </div>
    <script src="{{ url('assetsAdmin/js/jquery.min.js') }}"></script> 
    <script src="{{ url('assetsAdmin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assetsAdmin/js/bs-init.js') }}"></script>
    <script src="{{ url('assetsAdmin/js/sidebar.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    
</body>

</html>