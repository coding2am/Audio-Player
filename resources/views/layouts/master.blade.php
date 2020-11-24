<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/template/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/template/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/template/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/template/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/template/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/template/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/template/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/template/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/custom/css/custom.css') }}">
    <link rel="shortcut icon" href="#" />
    <!--===============================================================================================-->
</head>
<style>
    .link {
        cursor: pointer;
        margin-top: 20px;
    }

    .borderStyle {
        border: 2px solid #8E44AD;
        border-radius: 12px;
        box-shadow: 2px 2px rgba(142, 68, 173, 0.2);
    }

</style>

<body>

    <div class="limiter">
        <div class="container-login100"
            style="background-size:cover; background-position:center; background-image: url({{ asset('assets/template/images/bg-7.jpg') }});">
            <div class="wrap-login100 p-t-30 p-b-50">
                <div class="auth">
                    @guest
                        <a href="{{ route('login_page') }}" class="mr-3 text-light">Login</a>
                        <a href="{{ route('register_page') }}" class="text-light">Register</a>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-light" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->getRoleNames()[0] == 'admin')
                                    <a class="dropdown-item" href="{{ route('home_page') }}">Player</a>
                                    <a class="dropdown-item" href="{{ route('songs.create') }}">Add Song</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
                @yield('content')
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/vendor/select2/select2.min.js"') }}></script>
    <!--===============================================================================================-->
    <script src=" {{ asset('assets/template/ vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/template/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/template/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
