<form method="post" action="{{route('user.new')}}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" name="name" type="text">
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" type="text">
    </div>
    <div>
        <label for="profile_photo">Foto de perfil</label>
        <input type="file" name="profile_photo">
    </div>
    <div>
        <label for="password">Senha</label>
        <input id="password" name="password" type="password">
    </div>

    <button type="submit">Cadastrar</button>

</form>
