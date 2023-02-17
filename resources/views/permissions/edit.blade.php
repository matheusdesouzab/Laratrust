@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Editar regra - {{ $permission->display_name }}</h3>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary me-2">Voltar</a>
            </div>    
            <hr>
            <form class="row g-3 p-4" method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Nome da regra:</label>
                    <input type="text" class="form-control" id="role" name="name" value="{{ @old('name', $permission->name) }}">
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Nome legível da regra</label>
                    <input type="text" class="form-control" id="displayName" name="display_name" value="{{ @old('display_name', $permission->display_name) }}">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição da regra:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ @old('description', $permission->description) }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Atualizar regra</button>
                </div>
            </form>
        </div>
    </div>
@endsection
