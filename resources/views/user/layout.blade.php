<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clinic Kesihatan Malaysia</title>
    <link rel="stylesheet" href="{{url('assetsUser/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{url('assetsUser/fonts/fontawesome-all.min.css')}}"> 
    <link rel="stylesheet" href="{{url('assetsUser/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Article-List.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Footer-Clean.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Login-Form-Dark.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Navigation-Clean.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Navigation-with-Search.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Registration-Form-with-Photo.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Sidebar-Menu-1.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Sidebar-Menu.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/SIdebar-Responsive-2-1.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/SIdebar-Responsive-2.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('assetsUser/css/Testimonials.css')}}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="{{ route('user.home') }}">Company Name</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('clinic') }}" >Clinics</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('aboutUs') }}" >About Us</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#">Second Item</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Dropdown </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                    </li> --}}
                </ul>
                @if (Auth::user())
                    <div class="dropdown" style="padding: 13px;"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="far fa-user-circle" style="font-size: 30px;"></i></a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{ route('user.show', ['user' => md5(Auth::user()->id)]) }}">Profile<i class="fa fa-user" style="margin-left: 5px;"></i></a><a class="dropdown-item" href="{{ route('user.appointment') }}">My Appointment<i class="fa fa-calendar" style="margin-left: 5px;"></i></a><a class="dropdown-item" href="{{ route('user.logout') }}">Logout<i class="fa fa-sign-out" style="margin-left: 5px;"></i></a></div>
                    </div>
                @else
                    <span class="navbar-text actions">
                        <div class="btn-group" role="group" style="padding: 2px;"><button class="btn" type="button" data-bs-target="#login" data-bs-toggle="modal">Login</button><button class="btn btn-success border rounded-pill" type="button" data-bs-target="#modal-2" data-bs-toggle="modal">Sign Up</button></div>
                    </span>
                @endif
                
            </div>
        </div>
    </nav>

    @if ( Session::has('message') )
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{Session::forget('message')}}

    @endif

    @yield('content')
    
    <footer class="footer-clean">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Company Name © 2022</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade text-center" role="dialog" tabindex="-1" id="login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="login-clean">
                        <form action="{{ route('user.handleLogin') }}" method="POST">
                            @csrf
                            <h2 class="visually-hidden">Login Form</h2>
                            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
                            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center" role="dialog" tabindex="-1" id="modal-2">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="register-photo">
                        <div class="form-container">
                            <form method="post" action="{{ route('user.store') }}" >
                                @csrf
                                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                                <div class="mb-3">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Name" name="name">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Telephone No">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Date of Birth">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit">Sign Up</button>
                                </div>
                                <a class="already" href="login.html">You already have an account? Login here.</a>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('assetsUser/bootstrap/js/bootstrap.min.js')}}"></script> 
    <script src="{{url('assetsUser/js/Sidebar-Menu.js')}}"></script>

    @yield('js')

</body>

</html>