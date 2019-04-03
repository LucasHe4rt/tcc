@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="{{route('user.store')}}" class="card-category">Clique aqui para adicionar um novo usuário.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
                                                <img style="max-height: 150px;max-width: 200px" src="{{asset($u->profile_photo)}}">
                                            @else
                                                Sem foto
                                            @endif
                                        </td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{date_format($u->created_at,'d/m/Y')}}</td>
                                        <td>{{date_format($u->updated_at,'d/m/Y')}}</td>
                                        <td>
                                            <a style="color: #9095a2;" href="{{route('user.edit',['id' => $u->id])}}"><i class="material-icons">settings</i></a>
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
    </div>
@endsection

