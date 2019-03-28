<form method="post" action="{{route('admin.new')}}">
    @csrf
    <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="{{old('username')}}">
    </div>
    <div>
        <label for="passoword">Senha</label>
        <input id="password" type="password" name="password">
    </div>
    <button type="submit">Cadastrar</button>
</form>