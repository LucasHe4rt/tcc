@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo estabelecimento</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cnpj</th>
                                <th>Categoria</th>
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

    <!-- Modal -->
    <div  class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Novo Estabelecimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('establishment.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="users_id" class="bmd-label-floating">Usuário</label>
                            <select id="users_id" class="form-control" name="users_id">
                                <option value="">Selecione um usuário</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" class="bmd-label-floating">Cnpj</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj">
                        </div>
                        <div class="form-group">
                            <label for="types_id" class="bmd-label-floating">Categoria</label>
                            <select id="types_id" class="form-control" name="types_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" class="bmd-label-floating">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="description" class="bmd-label-floating">Descrição</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
