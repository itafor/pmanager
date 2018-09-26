<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pmanager') }}</title>

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <style type="text/css">
    .box{
        width: 600px;
        margin: 0 auto;
        border:1px solid #cc;
    }
    </style>
<style type="text/css">
.box{
    width: 800px;
    margin: 0 auto;
    border:1px solid #cc;
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="{{ route('livesearch.index') }}"><i class="fas fa-building"></i>Datatable Search</a></li>
                        <li><a href="{{ route('students.index') }}"><i class="fas fa-building"></i>Ajax CRUD</a></li>
                        <li><a href="{{ route('dynamicpdf.index') }}"><i class="fas fa-building"></i>view PDF</a></li>
                        <li><a href="{{ route('dynamic_dropdown.index') }}"><i class="fas fa-building"></i> Dependent dropdown</a></li>
                        <li><a href="{{ route('companies.index') }}"><i class="fas fa-building"></i> Companies</a></li>
                        <li><a href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> Projects</a></li>
                        <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> Tasks</a></li>
                         @if(Auth::user()->role_id == 1)
                         <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        <i class="far fa-user"></i> Admin <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
    <li><a href="{{ route('companies.index') }}"><i class="fas fa-building"></i> All Companies</a></li>
    <li><a href="{{ route('projects.index') }}"><i class="fas fa-briefcase"></i> All Projects</a></li> 
    <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> All Tasks</a></li> 
    <li><a href="{{ route('user.index') }}"><i class="fas fa-user"></i> All Users</a></li>
    <li><a href="{{ route('roles.index') }}"><i class="fas fa-briefcase"></i> All Roles</a></li>       
                        </ul>
                            </li>
                         @endif
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        <i class="far fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
@include('includes.success')
@include('includes.errors')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#student-table').DataTable();
        });
    </script>

@yield('script')

</body>
</html>
