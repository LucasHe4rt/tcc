@extends('layouts.view')
@section('content')
    <div class="conteudo">
        <div class="login-form mt-4">
            <h1> Login </h1>
            <form action="{{route('auth')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username"> Nome de usuário </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu nome de usuário">
                </div>
                <div class="form-group">
                    <label for="password"> Senha </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                </div>
                <button class="btn btn-primary btn-block"> Entrar </button>
            </form>
        </div>
    </div>
@endsection

