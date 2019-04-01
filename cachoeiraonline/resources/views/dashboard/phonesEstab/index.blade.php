<a href="{{route('phoneEstab.store')}}">Novo</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Número</th>
            <th>Estabelecimento</th>
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
                <td>{{$p->establishment->name}}</td>
                <td>{{$p->created_at}}</td>
                <td>{{$p->updated_at}}</td>
                <td>
                    <a href="{{route('phoneEstab.edit',['id' => $p->id])}}">Editar</a>
                    <a href="{{route('phoneEstab.remove',['id' => $p->id])}}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
