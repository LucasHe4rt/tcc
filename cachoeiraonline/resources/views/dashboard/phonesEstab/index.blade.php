@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Telefones de Estabelecimento</h4>
                        <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar um novo telefone de estabelecimento.</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>#</th>
                                <th>Número</th>
                                <th>Estabelecimento</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                @foreach($phones as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->number}}</td>
                                        <td>{{$p->establishment->name}}</td>
                                        <td>{{date_format($p->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($p->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: #9095a2;" href="{{route('phoneEstab.edit',['id' => $p->id])}}"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('phoneEstab.remove',['id' => $p->id])}}"><i class="material-icons">delete</i></a>
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
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Novo telefone de estabelecimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('phoneEstab.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="establishments_id" class="bmd-label-floating">Estabelecimento</label>
                            <select id="establishments_id" class="form-control" name="establishments_id">
                                <option value="">Selecione um estabelecimento</option>
                                @foreach($estabs as $e)
                                    <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
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
@endsection
