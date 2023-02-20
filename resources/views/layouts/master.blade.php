<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <main class="container-fluid p-0">
        <div class="row p-0">
            <div class="col-lg-3 vh-100 bg-dark">
                <div class="flex-shrink-0 p-3">
                    <h4 class="fw-bold text-center text-warning mb-4">Permissões</h4>
                    <p class="bg-white text-center py-2 px-3 fw-bold">{{ Auth()->user()->name }}</p>
                    <ul class="list-unstyled p-3 bg-light rounded-3">
                        <li class="mb-2">
                            <button class="btn btn-toggle rounded-2 collapsed w-100 text-start fw-semibold"
                                data-bs-toggle="collapse" data-bs-target="#funcoes-collapse" aria-expanded="true">
                                <i class="bi bi-caret-right"></i> Funções
                            </button>
                            <div class="collapse mb-3 p-3 mt-2 rounded-2 bg-white border" id="funcoes-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('roles.create') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 mb-2 bg-white"><i
                                                class="bi bi-plus"></i> Criar função</a></li>
                                    <li><a href="{{ route('roles.index') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 bg-white"><i
                                                class="bi bi-list"></i> Listagem</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-2">
                            <button class="btn btn-toggle rounded-2 collapsed w-100 text-start fw-semibold"
                                data-bs-toggle="collapse" data-bs-target="#permissao-collapse" aria-expanded="true">
                                <i class="bi bi-caret-right"></i> Permissões
                            </button>
                            <div class="collapse mb-3 p-3 mt-2 rounded-2 bg-white border" id="permissao-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('permissions.create') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 mb-2 bg-white"><i
                                                class="bi bi-plus"></i> Criar permissão</a></li>
                                    <li><a href="{{ route('permissions.index') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 bg-white"><i
                                                class="bi bi-list"></i> Listagem</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-2">
                            <button class="btn btn-toggle rounded-2 collapsed w-100 text-start fw-semibold"
                                data-bs-toggle="collapse" data-bs-target="#permissao-role-collapse" aria-expanded="true">
                                <i class="bi bi-caret-right"></i> Vincular permissão a função
                            </button>
                            <div class="collapse mb-3 p-3 mt-2 rounded-2 bg-white border" id="permissao-role-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="{{ route('permissions-roles.create') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 mb-2 bg-white"><i
                                                class="bi bi-plus"></i> Vincular</a></li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="mb-2">
                            <button class="btn btn-toggle rounded-2 collapsed w-100 text-start fw-semibold"
                                data-bs-toggle="collapse" data-bs-target="#staffs-collapse" aria-expanded="true">
                                <i class="bi bi-caret-right"></i> Funcionários
                            </button>
                            <div class="collapse mb-3 p-3 mt-2 rounded-2 bg-white border" id="staffs-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    @role('admin')
                                    <li><a href="{{ route('users.create') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 mb-2 bg-white"><i
                                                class="bi bi-plus"></i> Criar funcionário</a></li>
                                                @endrole
                                    <li><a href="{{ route('users.index') }}"
                                            class="link-dark text-decoration-none rounded fw-semibold d-block p-2 bg-white"><i
                                                class="bi bi-list"></i> Listagem</a></li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 bg-light">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
