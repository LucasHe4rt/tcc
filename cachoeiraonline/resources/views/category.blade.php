@extends('layouts.view')
@section('content')



@endsection
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class ="navbar-brand" href='#'> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Início </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('categories')}}">Categorias <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                        @if (Route::has('login'))
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    @auth
                                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                    @else
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row"> 
                    <div class="col-4 categories-cards"> 
                        <div class="card mb-3">
                            <h3 class="card-header">Nome estabelecimento</h3>
                            <div class="card-body">
                                <h5 class="card-title">Categoria estabelecimento</h5>
                            </div>
                            <img style="height: 200px; width: 100%; display: block;" src="https://placeimg.com/640/480/any" alt="imagem estabelecimento">
                            <div class="card-body">
                                <p class="card-text">Descricao estabelecimento bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Endereco estabelecimento</li>
                                <li class="list-group-item">Telefone estabelecimento</li>
                                <li class="list-group-item">numero de avaliacoes positivas </li>
                            </ul>
                            <div class="card-footer text-muted">
                                Adicionado em (Acho que ia ficar legal sla)
                            </div>
                        </div>
                    </div>
                    <div class="col-4 categories-cards"> 
                            <div class="card mb-3">
                                <h3 class="card-header">Card header</h3>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                </div>
                                <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                                <div class="card-footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                        <div class="col-4 categories-cards"> 
                                <div class="card mb-3">
                                    <h3 class="card-header">Card header</h3>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                                    </div>
                                    <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        2 days ago
                                    </div>
                                </div>
                            </div>
                </div>
                
            </div>

        <footer>
            <div class="container">
                <p> Categorias </p>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-4">
                            <a href="{{route('category', $category->id)}}"> {{$category->name}}</a>
                        </div>
                    @endforeach
                </div>
                <span id="footer-copyright"> &#169; 2019 - Cachoeira Online </span>
            </div>
        </footer>
        </div>
    </body>
</html>
