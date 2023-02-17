@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Permissões do {{ $role->display_name }}</h3>
                <a href="{{ route('roles.index') }}" class="btn btn-primary me-2">Voltar</a>
            </div>  
            <hr>
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Regra</th>
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
                                <form action="{{ route('permissions-roles.destroy', [$role->id, $permission->id]) }}" method="POST">
                                <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('permissions.show', $permission->id) }}"><i
                                                class="icon-sm text-white" data-feather="eye"></i>Ver regra</a>
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
    </div>
@endsection
