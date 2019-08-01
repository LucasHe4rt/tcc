@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Editar {{$admin->username}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.update',['id' => $admin->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="bmd-label-floating">Username</label>
                                <input class="form-control" id="username" type="text" name="username" value="{{$admin->username}}">
                            </div>
                            <div class="form-group">
                                <label for="password" class="bmd-label-floating">Senha</label>
                                <input class="form-control" id="password" type="text" name="password">
                            </div>
                            <button class="btn btn-info" type="submit">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
