@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="{{route('admin.store')}}" class="card-category">Clique aqui para adicionar um novo administrador.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>#</th>
                                <th>Nome de Usuário</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($admins as $a)
                                    <tr>
                                        <td>{{$a->id}}</td>
                                        <td>{{$a->username}}</td>
                                        <td>{{date_format($a->created_at,'d/m/Y')}}</td>
                                        <td>{{date_format($a->updated_at,'d/m/Y')}}</td>
                                        <td>
                                            <a style="color: #9095a2;" href="{{route('admin.edit',['id' => $a->id])}}"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('admin.remove',['id' => $a->id])}}"><i class="material-icons">delete</i></a>
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
