@extends('layouts.master')

@section('content')
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">{{ $user->name }}</h3>
                <a href="{{ route('users.index') }}" class="btn btn-success me-2">Listagem</a>
            </div>
            <hr>
            <form class="row g-3 p-4" method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">Nome do usuário</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ @old('name', $user->name) }}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ @old('email', $user->email) }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Atualizar dados do usuário</button>
                </div>
            </form>
        </div>
    </div>
@endsection