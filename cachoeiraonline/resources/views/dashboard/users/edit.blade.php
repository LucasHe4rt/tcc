@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Editar {{$user->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.update',['id' => $user->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="bmd-label-floating" for="name">Nome</label>
                                <input class="form-control" id="name" name="name" type="text" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="cpf">CPF</label>
                                <input class="form-control" id="cpf" name="cpf" type="text" value="{{$user->cpf}}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="profile_photo">Foto de perfil</label>
                                <input class="form-control" id="profile_photo" name="profile_photo" type="file">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="password">Senha</label>
                                <input class="form-control" id="password" name="password" type="password">
                            </div>

                            <button class="btn btn-info" type="submit">Atualizar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection