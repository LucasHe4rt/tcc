@extends('layouts.view')
@section('content')

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-6">
                    <div class="card mb-3 categories-cards" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-6 card-img-text">
                                <p> {{$category -> name}} </p>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <p class="card-text">Encontre as melhores {{ strtolower($category -> name) }} na cidade de Cachoeira Paulista.</p>
                                    <a href="{{ route('category', $category -> id)}}">
                                        <button class="btn btn-primary btn-block"> Ver mais </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection




