<form method="post" action="{{route('types.new')}}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" type="text" name="name">
    </div>

    <button type="submit">Cadastrar</button>
</form>
