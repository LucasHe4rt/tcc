<a href="{{route('user.store')}}">Novo</a>
<table>
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
        <th>Ações</th>
    </thead>
    <tbody>
    @foreach($users as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td>
                @if(isset($u->profile_photo))
                    <img width="200" height="150" src="{{asset($u->profile_photo)}}">
                @else
                    Sem foto
                @endif
            </td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{date_format($u->created_at,'d/m/Y')}}</td>
            <td>{{date_format($u->updated_at,'d/m/Y')}}</td>
            <td>
                <a href="{{route('user.edit',['id' => $u->id])}}">Editar</a>
                <a href="{{route('user.remove',['id' => $u->id])}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
