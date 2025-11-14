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
    <!-- Contenido principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <!-- Encabezado de módulo -->
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-ejidal">
                <i class="fas fa-users me-2"></i>Gastos
            </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-file-export me-1"></i>Exportar
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-print me-1"></i>Imprimir
                    </button>
                </div>
                <button type="button" class="btn btn-sm btn-ejidal">
                    <i class="fas fa-plus-circle me-1"></i>Nuevo Gasto
                </button>
            </div>
        </div>

        <!-- Barra de acciones CRUD -->
        <div class="crud-actions mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar Gasto...">
                        <button class="btn btn-ejidal" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-columns"></i> Columnas
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido específico del CRUD -->
        <div class="card card-ejidal">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Nuevo Gasto
            </div>
            <div class="card-body">
                <form method="POST" action="../servidor/insertarGasto.php">
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <label for="responsable" class="form-label">Responsable</label>
                            <input type="text" class="form-control" id="responsable" name="responsable" required>
                        </div>
                        <div class="col-md-5">
                            <label for="fecha" class="form-label">Fecha del Gasto</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="col-md-4">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" class="form-control" id="monto" name="monto" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <label for="medida" class="form-label">Medida</label>
                            <input type="text" class="form-control" id="medida" name="medida" required>
                        </div>
                        <div class="col-md-4">
                            <label for="concepto" class="form-label">Concepto</label>
                            <input type="text" class="form-control" id="concepto" name="concepto" required>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary me-2">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-1"></i> Guardar Gasto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>
    </div>
    @include('IncludeViews.pie')
    </div>

    <!-- Iconos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>

</html>