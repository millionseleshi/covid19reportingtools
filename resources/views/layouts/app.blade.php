<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}}</title>
    @include('layouts.styles')
</head>

<body class="layout-top-nav">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="#" class="navbar-brand">
                {{'Covid-19'}}
                <span class="brand-text font-weight-light">{{'Response Platform'}}</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">Home</a>
                    </li>
                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->role==="child_node_manager")
                            <li class="nav-item">
                                <a href="{{route('SendReportForm')}}" class="nav-link">DailyReport</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('SentReport')}}" class="nav-link">SentReport</a>
                            </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role==="central_node_manager")
                            <li class="nav-item">
                                <a href="{{route('CentralDashboard')}}" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('ViewReportForm')}}" class="nav-link">DailyReports</a>
                            </li>

                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role==="admin")
                            <li class="nav-item">
                                <a href="{{route('ManageNode')}}" class="nav-link">Manage Node</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="true" aria-expanded="false">Manage User</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('AddUserForm')}}">Add User</a>
                                    <a class="dropdown-item" href="{{route('UserList')}}">View User</a>
                                </div>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{auth()->user()->first_name}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-auto">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="container-fluid col-md-8">
                        <div class="alert alert-default-success text-capitalize text-center align-items-center"
                             role="alert">
                            {{__(session()->get('status'))}}
                        </div>
                    </div>
                @endif
                <div class="row">
                    <main class="container-fluid">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

    </div>

    <footer class="main-footer">

        <div class="float-right d-none d-sm-inline">
            {{__('Powered by Liq Technologies')}}
        </div>

        <strong>Copyright &copy; {{date('Y')}} <a href="#">COVID-19 Response Platform</a>.</strong> All rights reserved.
    </footer>

    @include('layouts.scripts')
</div>


</body>

</html>
