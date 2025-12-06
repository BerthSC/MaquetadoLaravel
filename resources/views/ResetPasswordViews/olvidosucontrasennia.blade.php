<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 p-4 bg-white rounded shadow">

            <h4 class="mb-4 text-center">Recuperar contraseña</h4>

            <!-- Mostrar error -->
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Mostrar mensaje de éxito -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }} Revisa tu bandeja de entrada para continuar.
                </div>
            @endif

            <form action="{{ route('forgot.send') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="correo_electronico" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar enlace</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Regresar al login</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
