<form method="post" action="{{route('user.update',['id' => $user->id])}}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" name="name" type="text" value="{{$user->name}}">
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{$user->email}}">
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" type="text" value="{{$user->cpf}}">
    </div>
    <div>
        <label for="profile_photo">Foto de perfil</label>
        <input id="profile_photo" name="profile_photo" type="file">
    </div>
    <div>
        <label for="password">Senha</label>
        <input id="password" name="password" type="password">
    </div>

    <button type="submit">Atualizar</button>

</form>