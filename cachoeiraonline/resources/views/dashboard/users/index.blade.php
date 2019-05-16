@extends('layouts.dashboard')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Usuários</h4>
                        <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo usuário.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>Criado em</th>
                                    <th>Atualizado em</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>
                                            @if(isset($u->profile_photo))
                                                <img style="max-height: 150px;max-width: 200px" src="{{asset('img'.DIRECTORY_SEPARATOR.'usersProfile'.DIRECTORY_SEPARATOR.$u->profile_photo)}}">
                                            @else
                                                Sem foto
                                            @endif
                                        </td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->cpf}}</td>
                                        <td>{{date_format($u->created_at,'d/m/Y')}}</td>
                                        <td>{{date_format($u->updated_at,'d/m/Y')}}</td>
                                        <td>
                                            <a href="{{route('user.establishments',['id' => $u->id])}}"><i class="material-icons">store_mall_directory</i></a>
                                            <a style="color: #9095a2;" onclick="userEdit({{$u->id}})" data-toggle="modal" data-target="#editUserModal" href="javascript:void(0)"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('user.remove',['id' => $u->id])}}"><i class="material-icons">delete</i></a>
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
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('user.new')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="bmd-label-floating">CPF</label>
                            <input data-mask="999.999.999-99" type="text" class="form-control" name="cpf" id="cpf">
                        </div>
                        <div class="form-group">
                            <label for="profile_photo" class="bmd-label-floating">Foto de perfil</label>
                            <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                        </div>
                        <div class="form-group">
                            <label for="password" class="bmd-label-floating">Senha</label>
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
        <div  class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content dark-edition">
                    <div style="background-color: #029eb1" class="modal-header">
                        <h5 style="color: #ffffff" class="modal-title" id="editUserModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #ffffff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="editUserForm" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="name" id="editName">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="editEmail">
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input data-mask="999.999.999-99" type="text" class="form-control" name="cpf" id="editCpf">
                            </div>
                            <div class="form-group">
                                <label for="profile_photo">Foto de perfil</label>
                                <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

