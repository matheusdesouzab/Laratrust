@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Criar funcionário</h3>
                <a href="{{ route('users.index') }}" class="btn btn-success me-2">Listagem</a>
            </div>
            <hr>
            <form class="row g-3 p-4" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="col-md-4">
                    <label for="name" class="form-label fw-bold">Nome do usuário</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-4">
                    <label for="role" class="form-label fw-bold">Função no sistema</label>
                    <select class="form-select" aria-label="Default select example" name="role_id">
                        <option selected>Selecione uma função</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Criar usuário</button>
                </div>
            </form>
        </div>
    </div>
@endsection
