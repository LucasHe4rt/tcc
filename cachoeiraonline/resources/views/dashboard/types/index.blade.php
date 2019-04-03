@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="{{route('types.store')}}" class="card-category">Clique aqui para adicionar um novo tipo de estabelecimento.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($types as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{date_format($t->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($t->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: #9095a2;" href="{{route('types.edit',['id' => $t->id])}}"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('types.remove',['id' => $t->id])}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


