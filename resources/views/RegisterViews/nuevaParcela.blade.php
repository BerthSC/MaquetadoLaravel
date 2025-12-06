<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejido San Rafael Ixtapalucan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <link rel="stylesheet" href="{{ asset('css/estiloNuevoE.css') }}">
</head>

<body>

@include('IncludeViews.cabeza')
@include('IncludeViews.menu')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-ejidal">
            <i class="fas fa-users me-2"></i>
            Nueva Parcela
        </h1>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif



    {{-- Buscador de Parcela sin tarjeta --}}
    <form method="GET" action="{{ route('parcelas.create') }}" class="mb-3">
        <div class="input-group">
            <input type="number" class="form-control" name="idParcela" placeholder="Buscar Parcela por numero..." required>
            <button class="btn btn-ejidal" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </form>

    @isset($parcela)
        <div class="alert alert-success mt-2">
            Parcela numero {{ $parcela->noParcela }} encontrada
        </div>
    @endisset

    @if (session('noParcela'))
        <div class="alert alert-danger mt-2">
            No se encontró una parcela con ese numero.
        </div>
    @endif





    {{-- Buscador de Ejidatario --}}
    <div class="card card-ejidal mb-3">
        <div class="card-header card-header-ejidal">Buscar Ejidatario por Numero</div>
        <div class="card-body">
            <form method="GET" action="{{ route('parcelas.create') }}">
                <div class="input-group">
                    <input type="number" class="form-control" name="numeroEjidatario" placeholder="Numero de Ejidatario..." required>
                    <button class="btn btn-success" type="submit">Buscar</button>
                </div>
            </form>

            @isset($ejidatario)
                <div class="alert alert-success mt-2">
                    Ejidatario encontrado:
                    <strong>{{ $ejidatario->nombre }} {{ $ejidatario->apellidoPaterno }} {{ $ejidatario->apellidoMaterno }}</strong>
                </div>
            @endisset

            @if (session('noEjidatario'))
                <div class="alert alert-danger mt-2">No se encontró un ejidatario con ese numero.</div>
            @endif
        </div>
    </div>




    {{-- Formulario principal --}}
    <form method="POST" action="{{ route('parcelas.store') }}">
        @csrf

        <input type="hidden" name="idEjidatario" value="{{ $ejidatario->idEjidatario ?? '' }}">



        {{-- Parcela --}}
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i>
                Parcela
            </div>
            <div class="card-body">

                @empty($ejidatario)
                    <div class="alert alert-warning">
                        Debes buscar un ejidatario valido antes de crear la parcela.
                    </div>
                @endempty

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">No Parcela</label>
                        <input type="number" class="form-control" name="noParcela" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>

                    <div class="col-md-7">
                        <label class="form-label">Superficie</label>
                        <input type="text" class="form-control" name="superficie" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Uso de Suelo</label>
                        <select class="form-select" name="usoSuelo" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                            @foreach ($usos as $uso)
                                <option value="{{ $uso->idUso }}">{{ $uso->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" name="ubicacion" {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>
                </div>

            </div>
        </div>




        {{-- Colindancias --}}
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i>
                Colindancia
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    @foreach (['norte','sur','este','oeste','noreste','noroeste','sureste','suroeste'] as $col)
                        <div class="col-md-3 mb-2">
                            <label class="form-label">{{ ucfirst($col) }}</label>
                            <input type="text" class="form-control" name="{{ $col }}" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>




        {{-- Coordenadas --}}
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i>
                Coordenadas
            </div>
            <div class="card-body">

                @foreach (range('A','G') as $index => $p)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Punto {{ $p }}</label>
                        <input type="text" pattern="[A-G]" maxlength="1" class="form-control" name="punto[]" {{ $index == 0 ? 'required' : '' }} {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Coordenada X</label>
                        <input type="number" step="0.0001" class="form-control" name="coordenadaX[]" {{ $index == 0 ? 'required' : '' }} {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Coordenada Y</label>
                        <input type="number" step="0.0001" class="form-control" name="coordenadaY[]" {{ $index == 0 ? 'required' : '' }} {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>
                </div>
                @endforeach

            </div>
        </div>




        {{-- Datos Administrativos --}}
        <div class="card card-ejidal mb-3">
            <div class="card-header card-header-ejidal">
                <i class="fas fa-edit me-2"></i>
                Informacion Administrativa
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Numero de inscripcion RAN</label>
                        <input type="text" class="form-control" name="num_inscripcionRAN" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>

                    <div class="col-md-7">
                        <label class="form-label">Clave nucleo agrario</label>
                        <input type="text" class="form-control" name="claveNucleoAgrario" required {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label class="form-label">Comunidad</label>
                        <input type="text" class="form-control" name="comunidad" {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>

                    <div class="col-md-7">
                        <label class="form-label">Fecha de expedicion</label>
                        <input type="date" class="form-control" name="fechaExpedicion" {{ isset($ejidatario) ? '' : 'disabled' }}>
                    </div>
                </div>

            </div>
        </div>




        <div class="text-end mt-4">
            <button type="submit" class="btn btn-ejidal">
                Guardar Informacion
            </button>
        </div>

    </form>

</main>

@include('IncludeViews.pie')

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>
</html>
