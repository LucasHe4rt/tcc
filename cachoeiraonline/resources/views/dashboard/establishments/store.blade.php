<form method="post" action="{{route('establishment.new')}}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" name="name" type="text">
    </div>
    <div>
        <label for="cnpj">CNPJ</label>
        <input id="cnpj" name="cnpj" type="text">
    </div>
    <div>
        <label for="address">Endereço</label>
        <input id="address" name="address" type="text">
    </div>
    <div>
        <label for="description">Descrição</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="users_id">Usuário</label>
        <select id="users_id" name="users_id">
            <option value="">Selecione um usuário</option>
            @foreach($users as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Cadastrar</button>

</form>