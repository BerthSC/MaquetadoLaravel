<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 p-4 bg-white rounded shadow">

            <h4 class="mb-4 text-center">Cambiar contraseña</h4>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('reset.password') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <input type="password" name="contrasennia" class="form-control" placeholder="Nueva contraseña" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="contrasennia_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Actualizar contraseña</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Regresar al login</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
