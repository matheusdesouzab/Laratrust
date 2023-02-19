@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Vincular permissão a função a {{ $user->name }}</h3>
                <a href="{{ route('permissions.index') }}" class="btn btn-success me-2">Ver premissões</a>
            </div>
            <hr>
            <form class="row g-3 p-4" method="POST" action="{{ route('permissions-roles.store') }}">
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
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Vincular  nova função</button>
                </div>
            </form>
        </div>
    </div>
@endsection
