<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('dashboard')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset ('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @if( \Illuminate\Support\Facades\Auth::guard('web')->check())
                        <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::guard('web')->user()->name}}</a>
                        @endif
                            @if( \Illuminate\Support\Facades\Auth::guard('patient')->check())
                                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::guard('patient')->user()->name}}</a>
                            @endif
                            @if( \Illuminate\Support\Facades\Auth::guard('doctor')->check())
                                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::guard('doctor')->user()->first_name}}</a>
                            @endif
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- menu-open -->
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Doctors
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{ url('doctor/all') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Doctors</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href={{ url('doctor/add') }} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Doctor</p>
                                    </a>
                                </li>




                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Doctor Specialty
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{ url('doctorSpecialty/all') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Doctors Specialty</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href={{ url('doctorSpecialty/add') }} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Doctor Specialty</p>
                                    </a>
                                </li>



                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Patients
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{ url('patient/all') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Patients</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Setting Appointments
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href={{ url('appointment/add') }} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Appointment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">

                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                                <input type="submit" value="Logout" class="btn btn-danger">
                            </form>


                        </li>


                    </ul>
                    @endif
                        @if(\Illuminate\Support\Facades\Auth::guard('doctor')->check())
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                                <!-- menu-open -->
                                <li class="nav-item ">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            My Patient
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href={{ route('doctor.patient') }} class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Patient</p>
                                            </a>
                                        </li>






                                    </ul>
                                </li>



                                <li class="nav-item ">

                                    <form action="{{ route('doctor.logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Logout" class="btn btn-danger">
                                    </form>


                                </li>


                            </ul>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::guard('patient')->check())
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                                <!-- menu-open -->
                                <li class="nav-item ">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Diseases
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href={{ url('disease/all') }} class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Diseases</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href={{ url('disease/add') }} class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create Disease</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="nav-item ">

                                    <form action="{{ route('patient.logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Logout" class="btn btn-danger">
                                    </form>


                                </li>


                            </ul>
                        @endif

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('main-content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
</body>

</html>
