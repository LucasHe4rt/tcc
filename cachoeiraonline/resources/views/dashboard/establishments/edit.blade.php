@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Editar {{$estab->name}}</h4>
                </div>
                <div class="card-body">
                   <form method="post" action="{{route('establishment.update',['id' =>$estab->id])}}">
                       @csrf
                       <div class="form-group">
                           <label for="name" class="bmd-label-floating">Nome</label>
                           <input class="form-control" id="name" name="name" type="text" value="{{$estab->name}}">
                       </div>
                       <div class="form-group">
                           <label for="cnpj" class="bmd-label-floating">CNPJ</label>
                           <input class="form-control" id="cnpj" name="cnpj" type="text" value="{{$estab->cnpj}}">
                       </div>
                       <div class="form-group">
                           <label for="address" class="bmd-label-floating">Endereço</label>
                           <input class="form-control" id="address" name="address" type="text" value="{{$estab->address}}">
                       </div>
                       <div class="form-group">
                           <label for="description" class="bmd-label-floating">Descrição</label>
                           <textarea class="form-control" id="description" name="description">{{$estab->description}}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="users_id" class="bmd-label-floating">Usuário</label>
                           <select class="form-control" id="users_id" name="users_id">
                               <option value="">Selecione um usuário</option>
                               @foreach($user as $u)
                                   <option {{$u->id == $estab->user->id ? 'selected' : ''}} value="{{$u->id}}">{{$u->name}}</option>
                               @endforeach
                           </select>
                       </div>

                       <button class="btn btn-info" type="submit">Atualizar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
