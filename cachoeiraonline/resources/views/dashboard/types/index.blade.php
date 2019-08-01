@extends('layouts.dashboard')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Categorias</h4>
                        <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar uma nova categoria.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($types as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->name}}</td>
                                        <td>{{date_format($t->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($t->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: #9095a2;" onclick="typeEdit({{$t->id}})" data-toggle="modal" data-target="#editTypeModal" href="javascript:void(0)"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('types.remove',['id' => $t->id])}}"><i class="material-icons">delete</i></a>
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

    <!-- Modal -->
    <div  class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Nova Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('types.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div  class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content dark-edition">
                    <div style="background-color: #029eb1" class="modal-header">
                        <h5 style="color: #ffffff" class="modal-title" id="editTypeModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #ffffff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="editTypeForm" action="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="name" id="editNameType">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection


