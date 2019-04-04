@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Editar a categoria {{$type->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('types.update',['id' => $type->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Nome</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$type->name}}">
                            </div>
                            <button type="submit" class="btn btn-info">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection