<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>

    <!-- Bootstrap y FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">

    @include('IncludeViews.cabeza')
</head>

<body>
    @include('IncludeViews.menu')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-4">

                    <!-- Encabezado -->
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-ejidal">
                            <i class="fas fa-boxes me-2"></i> Artículos
                        </h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="{{ route('equipos.create') }}" class="btn btn-sm btn-ejidal">
                                <i class="fas fa-plus-circle me-1"></i> Nuevo Artículo
                            </a>
                        </div>
                    </div>

                    <!-- Mensajes de sesión -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    <!-- Tabla de equipos -->
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Medida</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->descripcion }}</td>
                                    <td>{{ $equipo->cantidad }}</td>
                                    <td>{{ $equipo->estado }}</td>
                                    <td>{{ $equipo->medida }}</td>
                                    <td>{{ $equipo->fecha_registro }}</td>
                                    <td class="text-center">
                                        <!-- Editar -->
                                        <a href="{{ route('equipos.editar', $equipo->id_equipo) }}"
                                           class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Eliminar -->
                                        <form action="{{ route('equipos.eliminar', $equipo->id_equipo) }}"
                                              method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este equipo?')"
                                                    title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay equipos registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        </div>

        @include('IncludeViews.pie')

    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
