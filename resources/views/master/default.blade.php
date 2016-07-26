<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project Monitoring @yield('title')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/style.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/datapicker/datepicker3.css') !!}" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="{!! asset('js/jquery-2.1.1.js') !!}"></script>
    <script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script>

    <script src="{!! asset('lib/vuejs/vue.min.js')!!}"></script>

</head>
<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="/img/profile_small.jpg" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{!! Auth::user()->name !!}</strong>
                                </span>

                                <span class="text-muted text-xs block">Supervisor<b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{!! route('auth.logout') !!}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        JV
                    </div>
                </li>

                <li>
                    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Dashboard</span> </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">User</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{!! route('user.index') !!}">User List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-archive"></i> <span class="nav-label">Master</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{!! route('masterdata.role.index') !!}">Role</a></li>
                        <li><a href="{!! route('masterdata.employee.index') !!}">Employee</a></li>
                        <li><a href="{!! route('masterdata.client.index') !!}">Client</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Projects</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{!! route('project.index') !!}">Project List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{!! route('user.index') !!}">Laporan</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top gray-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">


                    <li>
                        <a href="{!! route('auth.logout') !!}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger" style="margin-bottom: 0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')

        <div class="footer">
            <div>
                <strong>Copyright</strong> Javan Labs &copy; 2015
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });

    </script>

    @stack('front.javascript')

</body>
</html>
