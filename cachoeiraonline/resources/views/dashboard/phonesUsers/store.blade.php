<form method="post" action="{{route('phoneUsers.new')}}">
    @csrf
    <div>
        <label for="users">Usuário</label>
        <select name="users_id" id="users">
            <option value="">Selecione um Usuário</option>
            @foreach($users as $e)
                <option value="{{$e->id}}">{{$e->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="number">Número</label>
        <input name="number" id="number" type="text">
    </div>

    <button type="submit">Cadastrar</button>
</form>
