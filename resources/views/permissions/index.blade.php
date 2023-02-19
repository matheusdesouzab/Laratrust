@extends('layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Listagem de permissões</h4>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary me-2 fw-bold">Nova</a>
            </div>    
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Permissão</th>
                        <th scope="col">Nome legível</th>
                        <th scope="col">Descrição</th>
                        <th scope="col" class="text-center">Ações disponíveis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }} </td>
                            <td>{{ $permission->display_name }} </td>
                            <td>{{ $permission->description }} </td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('permissions.edit', $permission->id) }}"><i
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
