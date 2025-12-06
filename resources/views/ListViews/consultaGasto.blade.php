<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @include('IncludeViews.cabeza')
</head>
<body>
    @include('IncludeViews.menu')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-ejidal">
                <i class="fas fa-boxes me-2"></i>Gastos
            </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('gastos.create') }}" class="btn btn-sm btn-ejidal">
                    <i class="fas fa-plus-circle me-1"></i> Nuevo Gasto
                </a>
            </div>
        </div>

                    <!-- Mensajes de éxito o error -->
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <!-- Tabla de gastos -->
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Responsable</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Concepto</th>
                                <th>Medida</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gastos as $gasto)
                                <tr>
                                    <td>{{ $gasto->responsable }}</td>
                                    <td>{{ $gasto->fecha }}</td>
                                    <td>{{ $gasto->monto }}</td>
                                    <td>{{ $gasto->concepto }}</td>
                                    <td>{{ $gasto->medida }}</td>
                                    <td>
                                        <a href="{{ route('gastos.editar', $gasto->idGasto) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('gastos.eliminar', $gasto->idGasto) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este gasto?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay gastos registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
</div>
            </div>
                </div>
            </div>
        </div>
        @include('IncludeViews.pie')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
