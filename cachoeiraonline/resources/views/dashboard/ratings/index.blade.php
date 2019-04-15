@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">Avaliações</h4>
                    <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#Modal">Clique aqui para adicionar uma nova avaliação.</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>#</th>
                            <th>Avaliação</th>
                            <th>Usuário</th>
                            <th>Estabelecimento</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($ratings as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->ratings}}</td>
                                    <td>{{$r->user->name}}</td>
                                    <td>{{$r->establishment->name}}</td>
                                    <td>{{date_format($r->created_at,"d/m/Y")}}</td>
                                    <td>{{date_format($r->updated_at,"d/m/Y")}}</td>
                                    <td>
                                        <a style="color: #9095a2;" onclick="ratingEdit({{$r->id}})" data-toggle="modal" data-target="#editModal" href="javascript:void(0)"><i class="material-icons">settings</i></a>
                                        <a style="color: red" href="{{route('ratings.remove',['id' => $r->id])}}"><i class="material-icons">delete</i></a>
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
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Nova Avaliação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('ratings.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="users_id">Usuário</label>
                            <select name="users_id" class="form-control" id="users_id">
                                <option value="">Selecione um usuário...</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="establishments_id">Estabelecimento</label>
                            <select name="establishments_id" class="form-control" id="establishments_id">
                                <option value="">Selecione um estabelecimento...</option>
                                @foreach($establishments as $e)
                                    <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Avaliação</label><br>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="star1" value="1"> 1
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="star2" value="2"> 2
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="star3" value="3"> 3
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="star4" value="4"> 4
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="star5" value="5"> 5
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div  class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="ratingModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="editRatingForm" action="">
                        @csrf
                        <div class="form-group">
                            <label for="users_id">Usuário</label>
                            <select name="users_id" class="form-control" id="editUsers_id">
                                <option value="">Selecione um usuário...</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="establishments_id">Estabelecimento</label>
                            <select name="establishments_id" class="form-control" id="editEstablishments_id">
                                <option value="">Selecione um estabelecimento...</option>
                                @foreach($establishments as $e)
                                    <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Avaliação</label><br>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="editStar1" value="1"> 1
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="editStar2" value="2"> 2
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="editStar3" value="3"> 3
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="editStar4" value="4"> 4
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="ratings" id="editStar5" value="5"> 5
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="editDescription">Descrição</label>
=======
                                <label for="description">Descrição</label>
>>>>>>> 66b030dd9c31de8d515421ff82b27f5eb0485907
                                <textarea name="description" class="form-control" id="editDescription" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
