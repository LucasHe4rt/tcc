@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Editar telefone de {{$phone->establishment->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('phoneEstab.update',$phone->id)}}">
                            @csrf
                            <div class="form-group">
                                <label class="bmd-label-floating" for="establishment">Estabelecimento</label>
                                <select class="form-control" id="establishment"  name="establishments_id">
                                    <option value="">Selecione um estabelecimento</option>
                                    @foreach($estabs as $e)
                                        <option {{$e->id == $phone->establishment->id ? 'selected' : ''}} value="{{$e->id}}">{{$e->name}}</option>
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