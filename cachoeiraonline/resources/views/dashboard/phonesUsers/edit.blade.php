@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Editar telefone de {{$phone->user->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('phoneUsers.update',$phone->id)}}">
                            @csrf
                            <div class="form-group">
                                <label class="bmd-label-floating" for="users">Usuário</label>
                                <select class="form-control" id="users" name="users_id">
                                    <option value="">Selecione um usuário</option>
                                    @foreach($users as $u)
                                        <option {{$u->id == $phone->user->id ? 'selected' : ''}} value="{{$u->id}}">{{$u->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="number">Número</label>
                                <input class="form-control" id="number" value="{{$phone->number}}" name="number">
                            </div>
                            <button class="btn btn-info" type="submit">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection