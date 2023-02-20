@extends('layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Funções de {{ $user->name }}</h4>
                <a href="{{ route('roles.index') }}" class="btn btn-primary me-2 fw-bold">Listagem</a>
            </div>
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Funções</th>
                        <th scope="col">Nome legível</th>
                        <th scope="col">Descrição</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role_users as $role_user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role_user->name }} </td>
                            <td>{{ $role_user->display_name }} </td>
                            <td>{{ $role_user->description}} </td>
                            <td class="text-center">
                                <form action="{{ route('users.remove-rule-user.destroy', [$role_user->id, $user->id]) }}" method="POST">
                                <div class="d-grid gap-2 d-md-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="icon-sm text-white"
                                                        data-feather="trash"></i>Remover</button>
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card p-4 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Permissões de {{ $user->name }}</h4>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary me-2 fw-bold">Listagem</a>
            </div>
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Funções</th>
                        <th scope="col">Nome legível</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }} </td>
                            <td>{{ $permission->display_name }} </td>
                            <td>{{ $permission->description}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card p-4 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Adicionar nova função a {{ $user->name }}</h4>
            </div>
            <hr>
            <form class="row g-3 py-2" method="POST" action="{{ route('users.add-role') }}">
                @csrf
                <div class="col-md-12">
                    <label for="role" class="form-label fw-bold">Função no sistema</label>
                    <select class="form-select" aria-label="Default select example" name="role_id">
                        <option selected>Selecione uma função</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }} </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="col-12">
                    <button type="submit" class="btn btn-success fw-bold">Adicionar função</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
