@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Criar permissão</h4>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary me-2 fw-bold">Listagem</a>
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
            <form class="row g-3 py-2" method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Nome da permissão:</label>
                    <input type="text" class="form-control" id="role" name="name" value="{{ @old('name') }}">
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Nome legível da permissão</label>
                    <input type="text" class="form-control" id="displayName" name="display_name"
                        value="{{ @old('display_name') }}">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição da permissão:</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ @old('description') }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success fw-bold">Criar permissão</button>
                </div>
            </form>
        </div>
    </div>
@endsection
