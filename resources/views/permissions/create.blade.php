@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Criar premissão</h3>
                <a href="{{ route('permissions.index') }}" class="btn btn-success me-2">Ver premissões</a>
            </div>    
            <hr>
            <form class="row g-3 p-4" method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Nome da permissão:</label>
                    <input type="text" class="form-control" id="role" name="name">
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Nome legível da permissão</label>
                    <input type="text" class="form-control" id="displayName" name="display_name">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição da permissão:</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Criar permissão</button>
                </div>
            </form>
        </div>
    </div>
@endsection
