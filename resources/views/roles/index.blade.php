@extends('layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Listagem de funções</h4>
                @role('admin')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary me-2 fw-bold">Nova</a>
                @endrole
            </div>  
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Função</th>
                        <th scope="col">Nome legível</th>
                        <th scope="col">Descrição</th>
                        <th scope="col" class="text-center">Ações disponíveis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }} </td>
                            <td>{{ $role->display_name }} </td>
                            <td>{{ $role->description }} </td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('roles.show', $role->id) }}"><i
                                                class="icon-sm text-white" data-feather="eye"></i>Dados gerais</a>
                                                @role('admin')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('roles.edit', $role->id) }}"><i
                                                class="icon-sm text-white" data-feather="edit"></i>Editar</a>
                                                @endrole
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
