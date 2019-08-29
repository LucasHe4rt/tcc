@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">Estabelecimentos</p>
                <h3 class="card-title">
                    {{$establishments->count()}}
                </h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
