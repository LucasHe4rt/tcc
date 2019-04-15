@extends('layouts.dashboard')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Telefones de Usuário</h4>
                        <a href="javascript:void(0)" class="card-category"  data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo telefone de usuário.</a>
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
                                            <a style="color: #9095a2;" onclick="phoneUserEdit({{$p->id}})" data-toggle="modal" data-target="#editPhoneUserModal" href="javascript:void(0)"><i class="material-icons">settings</i></a>
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
                    <form method="post" action="{{route('phoneUsers.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="user_id" class="bmd-label-floating">Usuário</label>
                            <select id="user_id" class="form-control" name="user_id">
                                <option value="">Selecione um usuário</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number" class="bmd-label-floating">Número</label>
                            <input type="text" class="form-control" name="number" id="number">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div  class="modal fade" id="editPhoneUserModal" tabindex="-1" role="dialog" aria-labelledby="editphoneUserModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content dark-edition">
                    <div style="background-color: #029eb1" class="modal-header">
                        <h5 style="color: #ffffff" class="modal-title" id="editphoneUserModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #ffffff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="editPhoneUsersForm" action="">
                            @csrf
                            <div class="form-group">
                                <label for="editUser_id" class="bmd-label-floating">Usuário</label>
                                <select id="editUser_id" class="form-control" name="user_id">
                                    <option value="">Selecione um usuário</option>
                                    @foreach($users as $u)
                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number">Número</label>
                                <input type="text" class="form-control" name="number" id="editNumberUser">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
