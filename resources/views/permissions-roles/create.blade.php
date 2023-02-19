@extends('layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Vincular permissão a função</h4>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary me-2 fw-bold">Ver permissões</a>
            </div>
            <hr>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Você precisa corrigir os seguintes erros<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row g-3 px-2" method="POST" action="{{ route('permissions-roles.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Função a ser atribuida uma permissão</label>
                    <select class="form-select" aria-label="Default select example" name="role_id">
                        <option selected>Selecione uma função</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Permissão a ser atribuida</label>
                    <select class="form-select" aria-label="Default select example" name="permission_id">
                        <option selected>Selecione uma permissão</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->display_name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Vincular permissão a função</button>
                </div>
            </form>
        </div>
    </div>
@endsection
