<form method="post" action="{{route('admin.update',['id' => $admin->id])}}">
    @csrf
    <div>
        <label>Username</label>
        <input type="text" name="username" value="{{$admin->username}}">
    </div>
    <div>
        <label>Senha</label>
        <input type="text" name="password">
    </div>
    <button type="submit">Atualizar</button>
</form>