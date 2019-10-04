<html>
<head>
    <title>Painel Administrativo | Cachoeira Online</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="{{asset('css/material-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>
<body class="dark-edition">
<div class="wrapper">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="{{asset('img/sidebar-2.jpg')}}">
        <div class="logo">
            <a href="{{route('dashboard.index')}}" class="simple-text logo-normal">
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
                    <a class="nav-link" href="{{route('types.index')}}">
                        <i class="material-icons">location_ons</i>
                        <p>Categorias</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <i class="material-icons">account_box</i>
                        <p>Administradores</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('ratings.index')}}">
                        <i class="material-icons">star</i>
                        <p>Avaliações</p>
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
<script src="{{asset('js/jquery.mask.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
{!! toastr()->render() !!}
</body>
</html>
