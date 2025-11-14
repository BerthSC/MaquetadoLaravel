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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-ejidal">
                <i class="fas fa-users me-2"></i>Parcelas
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
                    <i class="fas fa-plus-circle me-1"></i>Nueva Parcela
                </button>
            </div>
        </div>

        <div class="crud-actions mb-4">
            <div class="row">
                <div class="col-md-6">
                    <!-- Buscador -->
                    <form method="get" action="">
                        <div class="input-group">
                            <input type="number" class="form-control" name="idParcela"
                                placeholder="Buscar Parcela por ID..." required>
                            <button class="btn btn-ejidal" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
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

        <!-- Formulario Parcela -->
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Parcela
            </div>
            <div class="card-body">
                <form method="POST" action="../servidor/actualizarParcela.php">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="noParcela" class="form-label">No. Parcela</label>
                            <input type="text" class="form-control" id="noParcela" name="noParcela" required>
                        </div>
                        <div class="col-md-7">
                            <label for="superficie" class="form-label">Superficie</label>
                            <input type="text" class="form-control" id="superficie" name="superficie" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="usoSuelo" class="form-label">Uso de Suelo</label>
                            <input type="text" class="form-control" id="usoSuelo" name="usoSuelo">
                        </div>
                        <div class="col-md-7">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-0"></i> Guardar Parcela
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Formulario Colindancia -->
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Colindancia
            </div>
            <div class="card-body">
                <form method="POST" action="../servidor/actualizarColindancia.php">
                    <div class="row mb-3">
                       
                        <div class="col-md-3">
                            <label for=""></label>
                            <input type="text" class="form-control" id="" name="" required>
                        </div>
                       
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-0"></i> Guardar Colindancia
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Formulario Coordenadas -->
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Coordenadas
            </div>
            <div class="card-body">
                <form method="POST" action="../servidor/actualizarCoordenada.php">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="punto" class="form-label">Punto</label>
                            <input type="text" class="form-control" id="punto" name="punto" required>
                        </div>
                        <div class="col-md-4">
                            <label for="coordenadaX" class="form-label">Coordenada X</label>
                            <input type="text" class="form-control" id="coordenadaX" name="coordenadaX" required>
                        </div>
                        <div class="col-md-4">
                            <label for="coordenadaY" class="form-label">Coordenada Y</label>
                            <input type="text" class="form-control" id="coordenadaY" name="coordenadaY">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-0"></i> Guardar Coordenadas
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Formulario Información Administrativa -->
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i> Información Administrativa
            </div>
            <div class="card-body">
                <form method="POST" action="../servidor/actualizarInfAdmin.php">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="num_inscripcionRAN" class="form-label">Número de inscripción RAN</label>
                            <input type="text" class="form-control" id="num_inscripcionRAN" name="num_inscripcionRAN" required>
                        </div>
                        <div class="col-md-7">
                            <label for="claveNucleoAgrario" class="form-label">Clave núcleo agrario</label>
                            <input type="text" class="form-control" id="claveNucleoAgrario" name="claveNucleoAgrario" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="comunidad" class="form-label">Comunidad</label>
                            <input type="text" class="form-control" id="comunidad" name="comunidad">
                        </div>
                        <div class="col-md-7">
                            <label for="fechaExpedicion" class="form-label">Fecha de expedición</label>
                            <input type="date" class="form-control" id="fechaExpedicion" name="fechaExpedicion">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-ejidal">
                            <i class="fas fa-save me-0"></i> Guardar Información
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('IncludeViews.pie')
</div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
