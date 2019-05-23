@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">{{$user->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a onclick="userEdit({{$user->id}})"  class="text-info float-right" onclick="userEdit({{$user->id}})" data-toggle="modal" data-target="#editUserModal" href="javascript:void(0)">Editar</a>
                                    <h4 class="card-title">Informações</h4>
                                </div>
                                <div class="card-body">
                                    <strong>Foto de perfil: </strong>
                                    @if(isset($user->profile_photo))
                                        <br><img src="{{asset('img/usersProfile/'.$user->profile_photo)}}"><br>
                                        @else
                                        Sem Foto<br>   
                                    @endif
                                    <strong>Nome: </strong>{{$user->name}}<br>
                                    <strong>Email: </strong>{{$user->email}}<br>
                                    <strong>CPF: </strong>{{$user->cpf}}<br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a class="float-right text-success" href="javascript:void(0)">Novo</a>
                                    <h4 class="card-title">Telefones</h4>
                                </div>
                                <div class="card-body">
                                    @foreach($user->phones as $phone)
                                        {{$phone->number}}
                                        <a class="float-right text-danger" href="{{route('phoneUsers.remove',['id' => $phone->id])}}">Excluir</a>
                                        <a onclick="phoneUserEdit({{$phone->id}})" class="text-info float-right" data-toggle="modal" data-target="#editPhoneUserModal" href="javascript:void(0)">Editar</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <select disabled id="editUser_id" class="form-control" name="user_id">
                                            <option value="">Selecione um usuário</option>
                                                <option selected value="{{$user->id}}">{{$user->name}}</option>                                            
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
                                    <input type="file" name="profile_photo" id="profile_photo">
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