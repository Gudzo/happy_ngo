<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Админ Панел | Restoran Umbrella - Skopje Makedonija') }}</title>
        <!-- Custom fonts for this template-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
        @yield('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <body id="page-top">
        <div id="app">
            <nav class="navbar navbar-default bg-dark navbar-static-top mb-4 mb-lg-5">
                <div class="d-flex justify-content-between w-100">
                    <div class="navbar-header">
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.png') }}" class="img-fluid logo" style="width: 150px;">
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right text-white">
                            <!-- Authentication Links -->
                            @guest
                            <li><a href="{{ route('login') }}" class="white-link"><i class="fas fa-sign-in-alt"></i> Најава</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle white-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre><i class="fas fa-user-alt"></i> {{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Одјави се
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if ($view_name == 'auth-login')
            <div id="content-wrapper" class="login-page-wrapper">
            @else
            <div id="content-wrapper">
            @endif    
                @yield('content')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('vendor/charts.js/Chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/charts.js/Chart.bundle.min.js') }}"></script>
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')
    </body>
</html>