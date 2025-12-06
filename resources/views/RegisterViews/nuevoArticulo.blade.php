<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
    @include('IncludeViews.cabeza')
</head>

<body>
    @include('IncludeViews.menu')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

        {{-- Alertas --}}
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-ejidal">
                <i class="fas fa-tools me-2"></i>
                {{ isset($equipo) ? 'Editar Artículo' : 'Nuevo Artículo' }}
            </h1>

            
        </div>

        <div class="card card-ejidal">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i>
                {{ isset($equipo) ? 'Editar Artículo' : 'Nuevo Artículo' }}
            </div>

            <div class="card-body">

                <form method="POST"
                    action="{{ isset($equipo)
                                ? route('equipos.update', $equipo->id_equipo)
                                : route('equipos.store') }}">

                    @csrf
                    @if(isset($equipo))
                        @method('PUT')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control"
                                name="descripcion"
                                value="{{ $equipo->descripcion ?? old('descripcion') }}"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Cantidad</label>
                            <input type="number" class="form-control"
                                name="cantidad"
                                value="{{ $equipo->cantidad ?? old('cantidad') }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Estado</label>
                            <input type="text" class="form-control"
                                name="estado"
                                value="{{ $equipo->estado ?? old('estado') }}"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Medida</label>
                            <input type="text" class="form-control"
                                name="medida"
                                value="{{ $equipo->medida ?? old('medida') }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label class="form-label">Fecha Registro</label>
                            <input type="date" class="form-control"
                                name="fecha_registro"
                                value="{{ $equipo->fecha_registro ?? old('fecha_registro') }}">
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('equipos.principal') }}" class="btn btn-secondary me-2">
                            Cancelar
                        </a>
                        <button class="btn btn-ejidal">
                            Guardar Artículo
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </main>

    @include('IncludeViews.pie')
</body>
</html>
