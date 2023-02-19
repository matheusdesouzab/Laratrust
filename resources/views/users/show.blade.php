@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Dados de {{ $user->name }}</h3>
                <a href="{{ route('users.create') }}" class="btn btn-success me-2">Novo</a>
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
            <a class="btn btn-primary btn-sm"
            href="{{ route('users.add-role-create') }}"><i
                class="icon-sm text-white" data-feather="edit"></i>Adicionar nova função</a>
        </div>
    </div>
@endsection
