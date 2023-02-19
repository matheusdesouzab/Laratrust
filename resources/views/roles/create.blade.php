@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">Criar função</h4>
                <a href="{{ route('roles.index') }}" class="btn btn-primary me-2 fw-bold">Listagem</a>
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

            <form class="row g-3 py-2" method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="role" class="form-label fw-bold">Nome da função:</label>
                    <input type="text" class="form-control" id="role" name="name">
                </div>
                <div class="col-md-6">
                    <label for="displayName" class="form-label fw-bold">Nome legível da função:</label>
                    <input type="text" class="form-control" id="displayName" name="display_name">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">Descrição da função:</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success fw-bold">Criar função</button>
                </div>
            </form>
        </div>
    </div>
@endsection
