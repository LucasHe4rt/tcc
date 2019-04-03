<a href="{{route('types.store')}}">Novo</a>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($types as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td>{{$t->name}}</td>
            <td>{{date_format($t->created_at,"d/m/Y")}}</td>
            <td>{{date_format($t->updated_at,"d/m/Y")}}</td>
            <td>
                <a href="{{route('types.edit',['id' => $t->id])}}">Editar</a>
                <a href="{{route('types.remove',['id' => $t->id])}}">Excluir</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
