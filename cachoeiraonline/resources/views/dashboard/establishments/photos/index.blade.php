@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <a href="{{route('establishment.index')}}" class="btn btn-default float-right">Voltar</a>
                    <h4 class="card-title ">Fotos de {{$estab->name}}</h4>
                    <a href="javascript:void(0)" onclick="addPhoto({{$estab->id}})" class="card-category" data-toggle="modal" data-target="#establishmentPhotosModal">Clique aqui para adicionar fotos.</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($photos as $p)
                            <div class="col-md-3">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="{{asset('img/establishmentPhotos/'.$p->photo)}}" alt="Imagem">
                                    <div class="container">
                                        <p class="card-text">
                                            <small class="text-muted">Adicionado em {{date_format($p->created_at,'d/m/Y')}}</small>
                                            <a href="{{route('establishment.photo.remove',['id' => $p->id])}}" class="text-danger float-right">Excluir</a>
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
                    <form method="post" name="addPhotoForm" action="" enctype="multipart/form-data">
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
