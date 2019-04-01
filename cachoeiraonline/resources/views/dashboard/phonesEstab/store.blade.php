<form method="post" action="{{route('phoneEstab.new')}}">
    @csrf
    <div>
        <label for="establishment">Estabelecimento</label>
        <select name="establishments_id" id="establishment">
            <option value="">Selecione um estabelecimento</option>
            @foreach($estabs as $e)
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
