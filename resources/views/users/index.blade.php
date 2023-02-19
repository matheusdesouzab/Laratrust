@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Usuários</h3>
                <a href="{{ route('users.create') }}" class="btn btn-success me-2">Novo</a>
            </div>
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->email}} </td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('users.show', $user->id) }}"><i
                                                class="icon-sm text-white" data-feather="eye"></i>Dados gerais</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.edit', $user->id) }}"><i
                                                class="icon-sm text-white" data-feather="edit"></i>Editar</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
