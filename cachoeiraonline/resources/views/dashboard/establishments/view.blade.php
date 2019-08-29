@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <a href="{{route('establishment.index')}}" class="btn btn-default float-right">Voltar</a>
                    <h4 style="margin-top: 15px" class="card-title ">{{$estab->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <a onclick="establishmentEdit({{$estab->id}})"  class="text-info float-right" data-toggle="modal" data-target="#editEstablishmentModal" href="javascript:void(0)">Editar</a>
                                    <h4 class="card-title">Informações</h4>
                                </div>
                                <div class="card-body">
                                    <strong>Nome: </strong>{{$estab->name}}<br>
                                    <strong>CNPJ: </strong>{{$estab->cnpj}}<br>
                                    <strong>Endereço: </strong>{{$estab->address}}<br>
                                    <strong>Descrição:<p>{{$estab->description}}</p></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <a class="text-success float-right" data-toggle="modal" data-target="#Modal" href="javascript:void(0)">Novo</a>
                                    <h4 class="card-title">Telefones</h4>
                                </div>
                                <div class="card-body">
                                    @foreach($estab->phones as $phone)

                                       <div>
                                           <span>{{$phone->number}}</span>
                                           <a class="float-right text-danger" href="{{route('phoneEstab.remove',['id' => $phone->id])}}">Excluir</a>
                                           <a onclick="phoneEstabEdit({{$phone->id}})" class="text-info float-right" data-toggle="modal" data-target="#editPhonesEstabModal" href="javascript:void(0)">Editar</a>
                                       </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <a class="text-success float-right" data-toggle="modal" data-target="#establishmentPhotosModal" href="javascript:void(0)">Novo</a>
                                    <h4 class="card-title">Fotos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if($estab->photos->count() > 0)
                                            @foreach($estab->photos as $photo)
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <img style="max-height: 370px" class="card-img-top" src="{{asset('img/establishmentPhotos/'.$photo->photo)}}" alt="Imagem">
                                                        <div class="container">
                                                            <p class="card-text">
                                                                <small class="text-muted">Adicionado em {{date_format($photo->created_at,'d/m/Y')}}</small>
                                                                <a href="{{route('establishment.photo.remove',['id' => $photo->id])}}" class="text-danger float-right">Excluir</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-informacoes -->
    <div  class="modal fade" id="editEstablishmentModal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="editEstablishmentModalLabel">Editar {{$estab->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="establishmentForm" action="{{route('establishment.update',['id' => $estab->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Nome</label>
                            <input type="text" class="form-control" name="name" id="editName">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" >Cnpj</label>
                            <input type="text" class="form-control" name="cnpj" id="editCnpj">
                        </div>
                        <div class="form-group">
                            <label for="editType_id">Categoria</label>
                            <select id="editType_id" class="form-control" name="type_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" >Endereço</label>
                            <input type="text" class="form-control" name="address" id="editAddress">
                        </div>
                        <div class="form-group">
                            <label for="description" >Descrição</label>
                            <textarea class="form-control" name="description" id="editDescription"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal new phones -->
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
                    <form method="post" action="{{route('phoneEstab.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="establishment_id" class="bmd-label-floating">Estabelecimento</label>
                            <select id="establishment_id" class="form-control" name="establishment_id">
                                <option value="">Selecione um estabelecimento</option>
                                    <option selected value="{{$estab->id}}">{{$estab->name}}</option>
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


    <!-- Modal edit phones -->
    <div  class="modal fade" id="editPhonesEstabModal" tabindex="-1" role="dialog" aria-labelledby="editPhonesEstabModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="editPhonesEstabModalLabel">Editar telefone de {{$estab->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="editPhoneEstabForm" action="">
                        @csrf
                        <div class="form-group">
                            <label for="editEstablishment_id" class="bmd-label-floating">Estabelecimento</label>
                            <select disabled id="editEstablishment_id" class="form-control" name="establishment_id">
                                    <option selected value="{{$estab->id}}">{{$estab->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" name="number" id="editNumber">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal photos -->
    <div  class="modal fade" id="establishmentPhotosModal" tabindex="-1" role="dialog" aria-labelledby="establishmentPhotosModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentPhotosModalLabel">Adicionar Fotos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="addPhotoForm" action="{{route('establishment.photo.upload',['id' => $estab->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <label for="photos" class="">Adicionar fotos</label><br>
                            <input type="file"  name="photos[]" id="photos" multiple><br>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
