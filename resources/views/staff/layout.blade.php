<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Staff</title>
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
            <div class="text-center text-white logo py-4 mx-4"><a class="text-white text-decoration-none" id="title" href="#"><strong>Staff</strong></a><a class="text-white float-right" id="sidebarToggleHolder" href="#"><i class="fas fa-bars" id="sidebarToggle"></i></a></div>
        </li>
        <li class="nav-item"><a class="nav-link active text-left text-white py-1 px-0" href="{{ route('staff.home') }}"><i class="fas fa-tachometer-alt mx-3"></i><span class="text-nowrap mx-2">Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="{{ route('staff.schedule') }}"><i class="mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
          </svg></i><span class="text-nowrap mx-2">Schedule</span></a></li>
        
        
        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-left text-white py-1 px-0 position-relative" aria-expanded="false" data-toggle="dropdown" href="#"><i class="fas fa-sliders-h mx-3"></i><span class="text-nowrap mx-2">Settings</span><i class="fas fa-caret-down float-none float-lg-right fa-sm"></i></a>
            <div class="dropdown-menu border-0 animated fadeIn">
                <a class="dropdown-item text-white" href="{{ route('staff.resetpassword') }}"><span>Change password</span></a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link text-left text-white py-1 px-0" href="{{ route('staff.logout') }}"><i class="fas fa-sign-out-alt mx-3"></i><i class="fa fa-caret-right d-none position-absolute"></i><span class="text-nowrap mx-2">Log out</span></a></li>
    </ul>
    <div class="container article-clean">
        @if (Session::has('success'))
            <div class="alert alert-success text-break alert-dismissible" role="alert">
                <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('success') }}</span>
            </div>
            {{ Session::forget('success') }}
        @endif
        @if (Session::has('failed'))
            <div class="alert alert-danger text-break alert-dismissible" role="alert">
                <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('failed') }}</span>
            </div>
            {{ Session::forget('failed') }}
        @endif
        @if (Session::has('error'))
            <div class="alert alert-warning text-break alert-dismissible" role="alert">
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