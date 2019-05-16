@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">Estabelecimentos de {{$user->name}}</h4>
                    <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo estabelecimento.</a>
                </div>
                <div class="card-body">
                    <div class="row">
                    @foreach($establishments as $e)
                    <div class="col-md-6">
                            <div class="card">
                                    @if($e->photos->count() !=0)                                        

                                            <img class="card-img-top" height="150px" src="{{asset('img/establishmentPhotos/'.$e->photos->first()->photo)}}">
                            
                                    @endif
                                    <div class="card-body">
                                        <h4 class="card-title">{{$e->name}}</h4>
                                        <div>
                                            <strong>Cnpj: </strong>{{$e->cnpj}}<br>
                                            <strong>Endereço: </strong>{{$e->address}}<br>
                                           @if($e->phones->count() != 0)
                                               <strong>Telefones: </strong><br>
                                               @foreach($e->phones as $p)

                                                   {{$p->number}}

                                               @endforeach

                                           @endif
                                        </div>
                                        <p class="card-description">{{strlen($e->description) <= 80 ? $e->description : substr($e->description,0,80).'...'}}</p>
                                        <p class="card-text">
                                            <a href="javascript:void(0)" onclick="establishmentEdit({{$e->id}})" data-toggle="modal" data-target="#editModal" class="text-info">Editar</a>
                                            <a href="{{route('establishment.remove',['id' => $e->id])}}" class="text-danger float-right">Excluir</a>
                                        </p>                               
                                    </div>
                            </div>
                    </div>    
                    @endforeach
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
                    <h5 style="color: #ffffff" class="modal-title" id="editEstablishmentModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="establishmentForm" action="{{route('establishment.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="editUser_id">Usuário</label>
                            <select style="pointer-events:none;outline:none;" id="editUser_id" class="form-control" name="user_id">
                                <option value="{{$e->user_id}}">{{$e->user->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" >Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" >Cnpj</label>
                            <input type="text" data-mask="99.999.999/9999-99" class="form-control" name="cnpj" id="cnpj">
                        </div>
                        <div class="form-group">
                            <label for="type_id">Categoria</label>
                            <select id="type_id" class="form-control" name="type_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" >Endereço</label>
                            <input type="text" class="form-control" name="address" id="editAddress" >
                        </div>
                        <div class="form-group">
                            <label for="description" >Descrição</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <!-- editModal -->
    <div  class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="editModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="establishmentForm" action="{{route('establishment.update',['id' => $e->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="editUser_id">Usuário</label>
                            <select disabled id="editUser_id" class="form-control" name="user_id">
                                <option value="{{$e->user_id}}">{{$e->user->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" >Nome</label>
                            <input type="text" class="form-control" name="name" id="editName" value="{{$e->name}}">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" >Cnpj</label>
                            <input type="text" class="form-control" name="cnpj" id="editCnpj" value="{{$e->cnpj}}">
                        </div>
                        <div class="form-group">
                            <label for="editType_id">Categoria</label>
                            <select id="editType_id" class="form-control" name="type_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option {{ $e->type_id == $t->id ? 'selected' : ''}} value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" >Endereço</label>
                            <input type="text" class="form-control" name="address" id="editAddress" value="{{$e->address}}">
                        </div>
                        <div class="form-group">
                            <label for="description" >Descrição</label>
                            <textarea class="form-control" name="description" id="editDescription">{{$e->description}}</textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
