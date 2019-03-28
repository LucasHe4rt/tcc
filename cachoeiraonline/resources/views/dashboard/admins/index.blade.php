<a href="{{route('admin.store')}}">Novo</a>
<table>
    <thead>
        <th>#</th>
        <th>Username</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach($admins as $a)

            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->username}}</td>
                <td>{{date_format($a->created_at,'d/m/Y')}}</td>
                <td>{{date_format($a->updated_at,'d/m/Y')}}</td>
                <td>
                    <a href="{{route('admin.edit',['id' => $a->id])}}">Editar</a>
                    <a href="{{route('admin.remove',['id' => $a->id])}}">Excluir</a>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
