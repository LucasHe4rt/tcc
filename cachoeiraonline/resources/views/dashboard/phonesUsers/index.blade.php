<a href="{{route('phoneUsers.store')}}">Novo</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Número</th>
            <th>Usuário</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($phones as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->number}}</td>
                <td>{{$p->user->name}}</td>
                <td>{{$p->created_at}}</td>
                <td>{{$p->updated_at}}</td>
                <td>
                    <a href="{{route('phoneUsers.edit',['id' => $p->id])}}">Editar</a>
                    <a href="{{route('phoneUsers.remove',['id' => $p->id])}}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
