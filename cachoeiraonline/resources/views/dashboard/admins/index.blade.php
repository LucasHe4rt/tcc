@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Administradores</h4>
                        <a href="javascript:void(0)" class="card-category"  data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo administrador.</a>
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
                                            <a style="color: #9095a2;" onclick="adminEdit({{$a->id}})" href="javascript:void(0)" data-toggle="modal" data-target="#editModal"><i class="material-icons">settings</i></a>
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
    <!-- Modal -->
    <div  class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Novo telefone de estabelecimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="bmd-label-floating">Nome de Usuário</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="number" class="bmd-label-floating">Senha</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div  class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="adminModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="adminForm" name="adminForm" method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label for="username">Nome de Usuário</label>
                            <input type="text" class="form-control" name="username" id="editUsername">
                        </div>
                        <div class="form-group">
                            <label for="number" >Senha</label>
                            <input type="password" class="form-control" name="password" id="editpassword">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
