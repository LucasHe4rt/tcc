@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="{{route('phoneUsers.store')}}" class="card-category">Clique aqui para adicionar um novo telefone de usuário.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>#</th>
                                <th>Número</th>
                                <th>Usuário</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($phones as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->number}}</td>
                                        <td>{{$p->user->name}}</td>
                                        <td>{{date_format($p->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($p->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: #9095a2;" href="{{route('phoneUsers.edit',['id' => $p->id])}}"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('phoneUsers.remove',['id' => $p->id])}}"><i class="material-icons">delete</i></a>
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
