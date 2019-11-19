@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gerenciamento de usuários</div>
                <div class="card-body">
                    <table class="table table-dark">
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    @can('edit-users')
                                    <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn btn-primary btn-sm float-left">Editar</button></a>
                                    @endcan

                                    @can('delete-users')
                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
