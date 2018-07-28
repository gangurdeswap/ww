<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/bootstrapcdn.font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
        @if(!in_array('translations',Request::segments()))
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        @endif
        <link rel="stylesheet" href="{{asset('/css/_all-skins.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/admin_style.css')}}">
        @yield('css_content')
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script>
            var javascript_path = '{{url("/")}}';
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="../../index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>ADM</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-language"></i>
                                    <!--<span class="label label-success">4</span>-->
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Select Language</li>
                                    @php
                                    $all_languages = App\Language::all();
                                    @endphp
                                    @foreach ($all_languages as $language)
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="javascript:void(0);" class="lang_change_top" data-val="{{$language->lang_code}}">
                                                    <div class="item">
                                                        {{$language->lang_title}}
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('/css/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Admin</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{asset('/css/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                        <p>
                                            Admin
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!--Admin Left menu content section start-->
            @include('layouts/admin-left-menu')
            <!--Admin Left menu content section end-->
            <!--Main content section start-->
            @yield('content')
            <!--Main content section End-->
            <div class="control-sidebar-bg"></div>

            <!--Footer Section Start-->
            @if(!in_array('translations',Request::segments()))
            <script src="{{asset('/js/jquery.min.js')}}"></script>
            <script src="{{asset('/js/bootstrap.min.js')}}"></script>
            @endif
            <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('/js/adminlte.min.js')}}"></script>
            <script src="{{asset('/js/admin/admin.js')}}"></script>
            <!-- DataTables -->
            @yield('js_content')
            <footer class="main-footer">
                <strong>Copyright &copy; 2018-2019 <a href="javascript:void(0);">Enyota Learning</a>.</strong> All rights
                reserved.
            </footer>
            <!--Footer Section End-->
        </div>
    </body>
</html>