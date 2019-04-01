<form method="post" action="{{route('phoneUsers.update',$phone->id)}}">
    @csrf
    <div>
        <label for="users">Usuário</label>
        <select id="users" name="users_id">
                <option value="">Selecione um usuário</option>
            @foreach($users as $u)
                <option {{$u->id == $phone->user->id ? 'selected' : ''}} value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="number">Número</label>
        <input id="number" value="{{$phone->number}}" name="number">
    </div>
    <button type="submit">Atualizar</button>
</form>
