@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="{{route('establishment.store')}}" class="card-category">Clique aqui para adicionar um novo estabelecimento</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cnpj</th>
                                <th>Tipo</th>
                                <th>Usuário</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>

                                @foreach($estabs as $e)
                                    <tr>
                                        <td>{{$e->id}}</td>
                                        <td>{{$e->name}}</td>
                                        <td>{{$e->cnpj}}</td>
                                        <td>{{$e->type->name}}</td>
                                        <td>{{$e->user->name}}</td>
                                        <td>{{date_format($e->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($e->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: #288c6c" href="javascript:void(0)"><i class="material-icons">add_photo_alternate</i></a>
                                            <a style="color: #9095a2;" href="{{route('establishment.edit',['id' => $e->id])}}"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('establishment.remove',['id' => $e->id])}}"><i class="material-icons">delete</i></a>
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
