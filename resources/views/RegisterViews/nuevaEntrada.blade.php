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

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

    <div class="d-flex justify-content-between align-items-center border-bottom mb-4">
        <h2 class="text-ejidal"><i class="fas fa-plus"></i> Nueva Entrada</h2>
        <a href="{{ route('entradas.index') }}" class="btn btn-ejidal"><i class="fas fa-list"></i> Ver Lista</a>
    </div>

    <div class="card card-ejidal">
        <div class="card-header card-header-ejidal">Registrar Nueva Entrada</div>
        <div class="card-body">
            <form method="POST" action="{{ route('entradas.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Artículo / Equipo</label>
                        <select name="id_equipo" class="form-control" required>
                            <option value="">Seleccione un artículo</option>
                            @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id_equipo }}">{{ $equipo->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha entrada</label>
                        <input type="date" name="fecha_entrada" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('entradas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button class="btn btn-ejidal">Guardar Entrada</button>
                </div>
            </form>
        </div>
    </div>

</main>

@include('IncludeViews.pie')



<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>
</html>
