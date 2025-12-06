@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
        <h1 class="h2 text-ejidal">
            Entradas de Equipos
        </h1>

        <a href="{{ route('entradas.create') }}" class="btn btn-ejidal btn-sm">
            <i class="fas fa-plus"></i> Nueva Entrada
        </a>
    </div>

    @if(session('status'))
        <div class="alert alert-success mt-3">{{ session('status') }}</div>
    @endif

    <div class="card card-ejidal mt-4">
        <div class="card-header card-header-ejidal">Lista de Entradas</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-ejidal">
                    <tr>
                        <th>ID</th>
                        <th>Equipo</th>
                        <th>Cantidad</th>
                        <th>Fecha entrada</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->id_entrada }}</td>
                        <td>{{ $entrada->equipo }}</td>
                        <td>{{ $entrada->cantidad }}</td>
                        <td>{{ $entrada->fecha_entrada }}</td>
                        <td>{{ $entrada->observaciones }}</td>
                        <td>
                            <a href="{{ route('entradas.edit', $entrada->id_entrada) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('entradas.destroy', $entrada->id_entrada) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Desea eliminar esta entrada?');" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

@include('IncludeViews.pie')
