<html>
<head>
    <title>Painel Administrativo | Cachoeira Online</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="{{asset('css/material-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>
<body class="dark-edition">
<div class="wrapper">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="{{asset('img/sidebar-2.jpg')}}">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Cachoeira Online
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('dashboard.index')}}">
                        <i class="material-icons">home</i>
                        <p>Inicío</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('establishment.index')}}">
                        <i class="material-icons">store_mall_directory</i>
                        <p>Estabelecimentos</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('phoneEstab.index')}}">
                        <i class="material-icons">call</i>
                        <p>Telefones Estabelecimentos</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('user.index')}}">
                        <i class="material-icons">group</i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('phoneUsers.index')}}">
                        <i class="material-icons">contact_phone</i>
                        <p>Telefones Usuários</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('types.index')}}">
                        <i class="material-icons">location_ons</i>
                        <p>Tipos de Estabelecimentos</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <i class="material-icons">account_box</i>
                        <p>Administradores</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Cachoeira Online</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                                <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                                <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                                <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/material-dashboard.js')}}"></script>
{!! toastr()->render() !!}
</body>
</html>
