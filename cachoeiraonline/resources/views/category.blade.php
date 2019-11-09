@extends('layouts.view')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-4 categories-cards">
                @foreach($category->establishment as $c)



                    <div class="card mb-3">
                        <h3 class="card-header">{{$c->name}}</h3>
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                        </div>
                        <img style="height: 200px; width: 100%; display: block;" src="{{asset('img/establishmentPhotos/'.$c->photos()->first()->photo)}}" alt="imagem estabelecimento">
                        <div class="card-body">
                            <p class="card-text">{{$c->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$c->address}}</li>
                            @foreach($c->phones as $p)
                                <li class="list-group-item">{{$p->number}}</li>
                            @endforeach
                            <li class="list-group-item">{{$c->rates()->count()}}</li>
                        </ul>
                        <div class="card-footer text-muted">
                            {{date_format($c->created_at, 'd/m/Y')}}
                        </div>
                    </div>


                @endforeach

            </div>
        </div>

    </div>

@endsection



