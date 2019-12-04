@extends('layouts.view')
@section('content')

    <div class="content-principal">
        <div class="container">
            <div class="header">
                <img src="{{asset('img/logoBlack.png')}}" style="width: 350px; height: 350px; margin-top: 40px;" alt="Logo">
                <h1> Cachoeira Online </h1>
                <p> Seu guia para Cachoeira Paulista</p>
            </div>
            <div class="top-estabs">
                <h1> Melhores avaliações </h1>
                <div class="row">
                    @foreach($topEstabs as $topEstab)
                        <div class="col-4">
                            <div class="card">
                                <img class="card-img" src="{{asset('img/establishmentPhotos/'.$topEstab->establishment->photos()->first()->photo)}}" alt="estabelecimento">
                                <div class="card-body">
                                    <div class="card-title"> <h5>{{$topEstab -> establishment -> name}}</h5></div>
                                    <p class="card-text"> {{$topEstab -> establishment -> description}} </p>
                                    <button type="submit" class="btn btn-primary"> Conferir </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection


