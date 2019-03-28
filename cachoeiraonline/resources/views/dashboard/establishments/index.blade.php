<a href="{{route('establishment.store')}}">Novo</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>CNPJ</th>
            <th>Usuário</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estabs as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->name}}</td>
                <td>{{$e->cnpj}}</td>
                <td>{{$e->user->id}}</td>
                <td>{{$e->created_at}}</td>
                <td>{{$e->updated_at}}</td>
                <td>
                    <a href="{{route('establishment.edit',['id' => $e->id])}}">Editar</a>
                    <a href="{{route('establishment.remove',['id' => $e->id]
                    )}}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>