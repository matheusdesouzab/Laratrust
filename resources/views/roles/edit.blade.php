@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4"> 
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Editar função - {{ $role->display_name }}</h4>
                <a href="{{ route('roles.index') }}" class="btn btn-primary me-2 fw-bold">Voltar</a>
            </div>   
            <hr>
            <form class="row g-3 py-2" method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Nome da regra:</label>
                    <input type="text" class="form-control" id="role" name="name" value="{{ @old('name', $role->name) }}">
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Nome legível da regra</label>
                    <input type="text" class="form-control" id="displayName" name="display_name" value="{{ @old('display_name', $role->display_name) }}">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição da regra:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ @old('description', $role->description) }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Atualizar regra</button>
                </div>
            </form>
        </div>
    </div>
@endsection
