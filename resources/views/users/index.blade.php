@extends('layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Funcionários</h4>
                @role('admin')
                    <a href="{{ route('users.create') }}" class="btn btn-primary me-2 fw-bold">Novo</a>
                @endrole
            </div>
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        @permission('show-user')
                            <th scope="col" class="text-center">Ações disponiveis</th>
                        @endpermission
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ $user['avatar'] }}" width="35px" style="border-radius: 50%" /></td>
                            <td>{{ $user['name'] }} </td>
                            <td>{{ $user['email'] }} </td>
                            @permission('show-user')
                                <td class="text-center">
                                    <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-success btn-sm" href="{{ route('users.show', $user['id']) }}"><i
                                                class="icon-sm text-white" data-feather="eye"></i>Dados</a>
                                        @role('admin')
                                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user['id']) }}"><i
                                                    class="icon-sm text-white" data-feather="edit"></i>Editar</a>
                                        @endrole
                                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Deletar
                                            </button>

                                        </form>
                                    </div>
                                </td>
                            @endpermission
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
