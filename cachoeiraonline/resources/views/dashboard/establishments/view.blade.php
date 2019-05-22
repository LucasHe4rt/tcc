@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <a href="{{route('establishment.index')}}" class="btn btn-default float-right">Voltar</a>
                    <h4 style="margin-top: 15px" class="card-title ">{{$estab->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Informações</h4>
                            <strong>Nome: </strong>{{$estab->name}}<br>
                            <strong>CNPJ: </strong>{{$estab->cnpj}}<br>
                            <strong>Endereço: </strong>{{$estab->address}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
