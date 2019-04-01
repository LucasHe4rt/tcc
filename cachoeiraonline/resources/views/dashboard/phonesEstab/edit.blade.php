<form method="post" action="{{route('phoneEstab.update',$phone->id)}}">
    @csrf
    <div>
        <label for="establishment">Estabelecimento</label>
        <select id="establishment" name="establishments_id">
                <option value="">Selecione um estabelecimento</option>
            @foreach($estabs as $e)
                <option {{$e->id == $phone->establishment->id ? 'selected' : ''}} value="{{$e->id}}">{{$e->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="number">Número</label>
        <input id="number" value="{{$phone->number}}" name="number">
    </div>
    <button type="submit">Atualizar</button>
</form>
