<form method="post" action="{{route('establishment.update',$estab->id)}}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" name="name" type="text" value="{{$estab->name}}">
    </div>
    <div>
        <label for="cnpj">CNPJ</label>
        <input id="cnpj" name="cnpj" type="text" value="{{$estab->cnpj}}">
    </div>
    <div>
        <label for="address">Endereço</label>
        <input id="address" name="address" type="text" value="{{$estab->address}}">
    </div>
    <div>
        <label for="description">Descrição</label>
        <textarea id="description" name="description">{{$estab->description}}</textarea>
    </div>
    <div>
        <label for="users_id">Usuário</label>
        <select id="users_id" name="users_id">
            <option value="">Selecione um usuário</option>
            @foreach($user as $u)
                <option {{$u->id == $estab->user->id ? 'selected' : ''}} value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Cadastrar</button>

</form>
